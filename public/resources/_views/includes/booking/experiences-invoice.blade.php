<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets." />
        <meta name="author" content="Ansonika" />
        <title>K Town Rooms | Invoice</title>

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
                <div class="col-xs-6">
                    <div class="logo">
                        <img src="{{ url('resources/assets/web/img/logo.png') }}" />
                    </div>
                </div>
                <div class="col-xs-6">
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
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-xs-12">
                    <table class="table no-border">
                        <tr class="no-border width50">
                            <td class="no-border"><b style="width: 100px; display: inline-block;">Experiences Name:</b> {{ $hotel->OriginalExperiencesName }}<br><b style="width: 100px; display: inline-block;">Address:</b> {{ $hotel->Address.' '.$hotel->Address2 }}</td>
                            <td class="no-border" style="font-size:17px;"><div class="custom-helpline">Help Line No.: 	+92(213) 496 6031 - 33</div></td>
                        </tr>
                    </table>
                    <hr />
                    <table class="table table-bordered width25">
                        <tr>
                            <td class="text-center">Invoice</td>
                            <td class="text-center">Customer</td>
                            <td class="text-center">Paid On</td>
                            <td class="text-center">Status</td>
                        </tr>
                        <tr style="background: #f5f5f5;">
                            <td class="text-center">INV-{{ $Booking->ExperiencesBookingID }}</td>
                            <td class="text-center">{{ $Booking->FirstName.' '.$Booking->LastName }}</td>
                            <td class="text-center">{{ ($Booking->PaymentStatus == 1 ? $Booking->DateModified : 'Unpaid') }}</td>
                            <td class="text-center">{{ ($Booking->PaymentStatus == 1 ? 'Paid' : 'Unpaid') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="greybg">
                        <p><b>Invoice Issued To</b></p>
                        <table>
                            <tr>
                                <td style="width:30%;">Name:</td>
                                <td>{{ $Booking->FirstName.' '.$Booking->LastName }}</td>
                            </tr>
                            <tr>
                                <td>Cell:</td>
                                <td>{{ $Booking->Cell }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $Booking->Email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="greybg">
                        <p><b>Invoice Issued By</b></p>
                        <table>
                            <tr>
                                <td colspan="2">KTown Rooms</td>
                            </tr>
                            <tr>
                                <td style="width:35%;">Phone No.:</td>
                                <td>+92(213) 496 6031</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>billing@ktownrooms.com</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered" style="margin-bottom:2px;">
                        <tr style="background: #ea873a;
                            color: #fff;">
                            <th>Experiences</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Adults</th>
                            <th>Guests</th>
                            <th>Subtotal</th>
                        </tr>
                        <tr style="background: #f5f5f5;">
                            <td>{!! $hotel->ExperiencesName !!}</td>
                            <td>{{ $hotel->CheckInDate }}</td>
                            <td>{{ $hotel->CheckOutDate }}</td>
                            <td>{{ ($hotel->Adults + $hotel->Children) }}</td>
                            <td>{{ $hotel->RoomQty }}</td>
                            <td>PKR {{ number_format($hotel->Total, 0) }}</td>
                        </tr>
                        <tr>
                            <td class="no-border" colspan="5">Discount:</td>
                            <td class="" style="background: #f5f5f5;">PKR {{ number_format($Booking->Discount, 0) }}</td>
                        </tr>
                        <tr>
                            <td class="no-border" colspan="5">Promo Discount:</td>
                            <td class="" style="background: #f5f5f5;">PKR {{ number_format($Booking->PromoDiscount, 0) }}</td>
                        </tr>
                        <tr>
                            <td class="no-border" colspan="5">Total:</td>
                            <td class="" style="background: #f5f5f5;">PKR {{ number_format($Booking->TotalAmount, 0) }}</td>
                        </tr>
                    </table>
                    <p>Note: This hotel run under "{{ $hotel->OwnerName }}" trade agreement and KTown standards.</p>
                </div>
            </div>
            <br /> <br />
        </div>
    </body>
</html>

