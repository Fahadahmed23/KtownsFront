<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets." />
        <meta name="author" content="Ansonika" />
        <title>K Town Rooms | Night Audit Report</title>

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
                padding-top: 30px;
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
                background: #ea873a;
                color: #fff;
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
                <!--<div class="col-xs-6">
                    <h3>KTown Rooms</h3>
                    <table>
                        <tr>
                            <td style="width:30%"><b>Address:</b></td>
                            <td>University Road, Near KFC, Gulshan Iqbal, Karachi</td>
                        </tr>
                        <tr>
                            <td><b>Phone No.:</b></td>
                            <td>+92(213) 496 6031 - 33</td>
                        </tr>
                        <tr>
                            <td><b>Website:</b></td>
                            <td>www.ktownrooms.com</td>
                        </tr>
                    </table>
                </div>-->
            </div>
            <hr />
            <!--<div class="row">
                <div class="col-xs-12">
                    <table class="table no-border">
                        
                    </table>
                    <hr />
                    <table class="table table-bordered width25">
                        <tr>
                            <td class="text-center">Invoice</td>
                            <td class="text-center">Customer</td>
                            <td class="text-center">Paid On</td>
                            <td class="text-center">Status</td>
                        </tr>
                        
                    </table>
                </div>
            </div>-->
            <div class="row">
            </div>
            <br />
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered" style="margin-bottom:2px;">
                        <tr style="background: #ea873a;
                            color: #fff;">
                            <th>Name</th>
                            <th>Room#</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Guest Status</th>
                            <th>Basic Price</th>
                            <th>Difference</th>
                            
                        </tr>
                        <?php foreach($Bookings as $Booking) { ?>
                        <tr style="background: #f5f5f5;">
                            <td>{{ $Booking->FirstName}}</td>
                            <td>{{ $Booking->RoomNumber }}</td>
                            <td>{{ $Booking->CheckInDate }}</td>
                            <td>{{ $Booking->CheckOutDate }}</td>
                            <td><?php echo $Booking->CheckingStatus; ?></td>
                            <td>{{ $Booking->SellingPrice }}</td>
                            <td>{{ $Booking->SellingPrice - $Booking->FixHotelPrice }}</td>
                        </tr>
                        <?php } ?>
                    </table>
                    
                </div>
            </div>
            <br /> <br />
        </div>
    </body>
</html>

