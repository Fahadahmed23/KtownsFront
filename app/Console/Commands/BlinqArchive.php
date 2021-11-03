<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BlinqArchive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blinq:archive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To delete all archive entries from bookings and invoice detail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function cron_logs($message)
    {
        # create logs if success or error comes
        $data = [
            'message' => $message,
        ]; 
        \DB::table('cron_logs')->insert($data);
        // CronLog::create($data);
    }
    
    public function blinqArchivePartner()
    {
        $ch3 = curl_init('https://partners.ktownrooms.com/blinq_archive');   // where to post                                                                   
        curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "POST");    
        // curl_setopt($ch3, CURLOPT_HEADER, 1);
        // curl_setopt($ch3, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch3, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                            
            // 'Content-Length: ' . strlen($data_string)
            )                                                                       
        );                                                                                                                   
        
        $result = curl_exec($ch3);
        if(empty($result)) return false;
        else
        {
            // dd($result);
            $response = json_decode($result);
            // dd($result);
            if(isset($response->success) && $response->success){
                return true;
            }
            return false;
        }
    }
    
    public function test(){
        $blinq_archive_partner = $this->blinqArchivePartner();
        if($blinq_archive_partner){
            $this->cron_logs('Cron runs successfully for Partners');
        } else {
            $this->cron_logs('Cron fail for Partners');
        }
        $archive_bookings = \DB::table('bookings')->where('IsArchive', 1)->get();
        if(count($archive_bookings)){
            foreach($archive_bookings as $ab){
                $parsed = Carbon::parse($ab->DateAdded);
                $passed_second = $parsed->diffInSeconds(Carbon::now());
                // dd($ab->BookingID);
                $BookingID = $ab->BookingID;
                if($passed_second > 3600){
                    // $ab->delete();
                    $this->cron_logs('Cron runs successfully for booking id: '.$BookingID);
                } else {
                    $this->cron_logs('Cron runs but not deleted archive because data is not older than 1 hour - for booking id '.$BookingID);
                }
            }
        } else {
            
            $this->cron_logs('No cron to run');
        }
        echo 'Archive Deleted Successfully';
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $blinq_archive_partner = $this->blinqArchivePartner();
            if($blinq_archive_partner){
                $this->cron_logs('Cron runs successfully for Partners');
            } else {
                $this->cron_logs('Cron fail for Partners');
            }
            
            $archive_bookings = \DB::table('bookings')->where('IsArchive', 1)->get();
            if(count($archive_bookings)){
                foreach($archive_bookings as $ab){
                    $parsed = Carbon\Carbon::parse($ab->DateAdded);
                    $passed_second = $parsed->diffInSeconds(Carbon\Carbon::now());
                    $BookingID = $ab->BookingID;
                    if($passed_second > 3600){
                        $ab->delete();
                        $this->cron_logs('Cron runs successfully for booking id: '.$BookingID);
                    } else {
                        $this->cron_logs('Cron runs but not deleted archive because data is not older than 1 hour - for booking id '.$BookingID);
                    }
                }
            } else {
                
                $this->cron_logs('No cron to run');
            }
            
            $blinq_archive_partner = $this->$blinqArchivePartner();
            echo 'Reminder Successfully';
        } catch (\Throwable $th) {
            //throw $th;
            $this->cron_logs($th->getMessage());
            echo 'Check Log';
        }
    }
}
