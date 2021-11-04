<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets." />
        <meta name="author" content="Ansonika" />
        <title>K Town Rooms | Expences Invoice</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png" />

        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet" />
        <link href="{{ url('resources/assets/web') }}/css/skins/square/grey.css" rel="stylesheet" />
        <style>
            .container {
                width: 700px;
                background: #fff;
            }
            p {
                margin:0;
                font-size: 11px;
            }
            h3 {
                font-size: 28px;
                margin: 4px 0;
            }
            .no-border {
                border:none !important;
            }
            .paddingtop60 {
                padding-top: 60px;
            }
            .logo {
                padding: 30px;
            }
            .greybg {
                background: #f5f5f5;
                padding: 25px 10px;
                border: 1px solid #ddd;
            }
            .greybg p b {
                font-size: 15px;
            }
            table.width25 tr td {
                width: 25%;
            }
            table tr.width50 td {
                width: 50%;
            }
            hr {
                border-color: #ea873a;
            }
            b {
                font-size: 15px;
            }
            .custom-helpline {
                /* background: #ea873a;*/
                color: #000;
                padding: 12px;
                margin: 0 !important;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row paddingtop60">
                <div class="col-xs-12">
                    <div class="logo">
                        <img src="{{ url('resources/assets/web/img/logo.png') }}" />
                    </div>
                </div>
                <div class="col-xs-6">
                    <table style="font-size:12px;">
                        <?php if($Booking->CompanyName!=NULL || $Booking->CompanyName!='') { ?>
                        <tr>
                            <td style="width:60%;font-size:12px;font-weight:bold;">Company Name:</td>
                            <td>{{ $Booking->CompanyName }}</td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td style="width:60%;font-size:12px;font-weight:bold;">Guest Name:</td>
                            <td>{{ $Booking->FirstName.' '.$Booking->LastName }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Email:</td>
                            <td>{{ $Booking->Email }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Cell:</td>
                            <td>{{ $Booking->Cell }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Identity:</td>
                            <td>{{ $Booking->Identity }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Address:</td>
                            <td>{{ $Booking->FullAddress }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6"><?php date_default_timezone_set("Asia/Karachi"); ?>
                    <table style="font-size:12px;">
                        <tr>
                            <td style="width:60%;font-size:12px;font-weight:bold;">NTN:</td>
                            <td>5268224</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Invoice#</td>
                            <td>{{ $Booking->BookingID }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Room#</td>
                            <td>{{ $hotel->RoomNumber }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Arr-Date</td>
                            <td>{{ $hotel->CheckInDate }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Dep-Date</td>
                            <td>{{ $hotel->CheckOutDate }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Cashier</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;font-weight:bold;">Print Time</td>
                            <td>{{date('h:i:s A')}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-xs-12">
                    <table class="table no-border">
                        <tr class="no-border width50">
                            <td class="no-border"><b style="width: 100px; display: inline-block;">Hotel Name:</b> {{ $hotel->OriginalHotelName }}<br><b style="width: 100px; display: inline-block;">Address:</b> {{ $hotel->Address.' '.$hotel->Address2 }}</td>
                            <td class="no-border" style="font-size:17px;"><div class="custom-helpline">Help Line No : 	+92(311) 1222 418</div></td>
                        </tr>
                    </table>
                    <hr />
                    <br/>
                    <br/>
                </div>
            </div>
            <div class="row">

            </div>
            <br />
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered" style="margin-bottom:2px;">
                        <tr style="background: #ea873a;
                            color: #fff;">
                            <th>Date</th>
                            <th>Description</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance</th>
                        </tr>
                        <?php foreach ($Transationals as $Transational) { 
                            if($Transational->Status != 1) { 
                            $roomtax = ($Transational->Debit * $Govtsalestax); ?>
                            <tr style="background: #f5f5f5;">
                                <td>{{$Transational->TransactionDate}}</td>
                                <td>{{$Transational->TransactionDescription }}</td>
                                <td>{{number_format($Transational->Debit - $roomtax,0) }}</td>
                                <td>{{number_format($Transational->Credit,0) }}</td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        <?php }
                        $Miscellaneous = $Miscellaneous[0]->TotalAmount;
                        ?>
                        <?php if ($Miscellaneous != NULL || $Miscellaneous != '') { ?>
                            <tr style="background: #f5f5f5;">
                                <td>{{date("j F Y")}}</td>
                                <td>Miscellaneous</td>
                                <td>{{number_format($Miscellaneous, 0)}}</td>
                                <td>{{0}}</td>
                                <td></td>
                            </tr>
                            <tr style="background: #f5f5f5;">
                                <td>{{date("j F Y")}}</td>
                                <td>Total Miscellaneous Sales Tax {{$percent}}</td>
                                <td>{{number_format($Miscellaneous * $Govtsalestax, 0)}}</td>
                                <td>{{0}}</td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        <?php if (isset($Transationalamount[0]->Debit)) {
                        $salesTax =  (($Transationalamount[0]->Debit + $Miscellaneous)* $Govtsalestax);
                        } ?>
                        <tr style="background: #f5f5f5;">
                            <td>{{date("j F Y")}}</td>
                            <td>Total Room Rent Sales Tax {{$percent}}</td>
                            <td><?php if (isset($Transationalamount[0]->Debit)) {
                                    echo number_format($Transationalamount[0]->Debit * $Govtsalestax, 0);
                                } ?></td>
                            <td>{{0}}</td>
                            <td></td>
                        </tr>
                        <?php if (isset($FinalSettlement[0]->Debit) || isset($FinalSettlement[0]->Credit)) { ?>
                        <tr style="background: #f5f5f5;">
                            <td>{{date("j F Y")}}</td>
                            <td>Final Settlement</td>
                            <td>{{number_format($FinalSettlement[0]->Debit, 0)}}</td>
                            <td>{{number_format($FinalSettlement[0]->Credit, 0)}}</td>
                            <td></td>
                        </tr>
                        <?php } ?>
                        <?php if (isset($FinalSettlement[0]->Status) != 1) { 
                         if (isset($Transationalamount[0]->Debit) || isset($Transationalamount[0]->Credit)) { 
                            $total = (($Transationalamount[0]->Debit - $Transationalamount[0]->Debittax ) + $Miscellaneous + $salesTax) - $Transationalamount[0]->Credit; ?>
                        <tr>
                            <td class="no-border" colspan="4"><?php if ($total < 0){ echo "Payable:";}else{echo "Receivable:";} ?></td>
                            <td class="" style="background: #f5f5f5;">
                                <?php echo number_format($total, 0); ?>
                            </td>
                        </tr>
                        <?php
                        } 
                        } ?>
                        <tr style="background: #ffffff;">
                            <td></td>
                            <td>Total</td>
                            <td><?php if (isset($Transationalamount[0]->Debit)) {
    echo number_format((($Transationalamount[0]->Debit - $Transationalamount[0]->Debittax ) + $salesTax  + $Miscellaneous + $FinalSettlement[0]->Debit), 0);
} ?></td>
                            <td><?php if (isset($Transationalamount[0]->Credit)) {
    echo number_format(($Transationalamount[0]->Credit + $FinalSettlement[0]->Credit), 0);
} else {
    echo number_format($Booking->TotalAmount, 0);
} ?></td>
                            <td></td>
                        </tr>
                    </table>
                    <?php if($Booking->CompanyName != '' || $Booking->CompanyName != NULL) { ?>
                    <p>We thank you for choosing Ktown Rooms for your stay. Please br informed that a cross cheque infavor of "Kaabil Technology Services(Pvt)Ltd" may kindly be issued after withholding of income tax @08% as per section 153(1)(b)(i) </p>
                    <?php } ?>
                </div>
            </div>
            <br /> <br />
            <div class="row">
                <div class="col-xs-6">
                    <table class="" style="">
                        <tr style="">
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>_______________________________</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">Receptionist Signature</td>
                            </tr>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6">
                    <table class="" style="">
                        <tr style="">
                            <tr>
                                <td>_______________________________</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">Guest Signature</td>
                            </tr>
                        </tr>
                    </table>
                </div>
            </div>
            <br /> <br /><br /> <br /><br /> <br />
        </div>
    </body>
</html>