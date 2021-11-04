<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets." />
    <meta name="author" content="Ansonika" />
    <title>Booking | Confirmation</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png" />
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png" />
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png" />
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png" />

    <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet" />
    <link href="{{ url('resources/assets/web') }}/css/skins/square/grey.css" rel="stylesheet" />
    <style>
        @media print {
            .page-header {
                display: none;
            }
            @page {
                size: auto;
                margin: 0mm;
            }
        }
    </style>
</head>

<body>
    <div class="container" style="width: 700px;background: #fff;">
        <div class="row" style="padding-top: 60px;">
            <div class="col-xs-6">
                <div style="padding-top: 30px;">
                    <img src="{{ url('resources/assets/web/img/logo.png') }}" />
                </div>
            </div>
            <div class="col-xs-6">
                <h3 style="font-size: 28px;margin: 4px 0;">Head Office</h3>
                <table>
                    <tr>
                        <td style="width:30%"><b style="font-size: 15px;">Address:</b></td>
                        <td>73C Jami Commercial Phase VII DHA Karachi</td>
                    </tr>
                    <tr>
                        <td><b style="font-size: 15px;">Phone No.:</b></td>
                        <td>+92(311) 1222 418</td>
                    </tr>
                    <tr>
                        <td><b style="font-size: 15px;">Website:</b></td>
                        <td>www.ktownrooms.com</td>
                    </tr>
                </table>
            </div>
        </div>
        <hr style="border-color: #ea873a;" />
        <div class="row">
            <div class="col-xs-12">
                <table class="table" style="border: none !important;">
                    <tr style="border: none !important;">
                        <td style="border: none !important;width: 50%;"><b style="width: 100px; display: inline-block;font-size: 15px;">Hotel Name:</b> {{ $hotel[0]->HotelName }}<br><b style="width: 100px; display: inline-block;font-size: 15px;">Hotel Address:</b> {{ $hotel[0]->Address.' '.$hotel[0]->Address2 }}
                        </td>
                        <td style="border: none !important;font-size:11px;width: 50%;">
                            <div style="background: #ea873a;color: #fff;padding: 12px;margin: 10px !important;">Help Line No.: +92(311) 1222 418</div>
                        </td>
                    </tr>
                </table>
                <div class="mapsec">
                    <img src="{{ url('resources/assets/web/img/ktownmap.png') }}" alt="" style="width: 100%;max-width: 100%;">
                </div>
                <hr style="border-color: #ea873a;" />
                <table class="table table-bordered">
                    <tr>
                        <td class="text-center" style="width: 25%;">Booking Confirmation #</td>
                        <td class="text-center" style="width: 25%;">Customer</td>
                        <td class="text-center" style="width: 25%;">Paid On</td>
                        <td class="text-center" style="width: 25%;">Status</td>
                    </tr>
                    <tr style="background: #f5f5f5;">
                        <td class="text-center" style="width: 25%;">{{ $Booking[0]->BookingCode }}</td>
                        <td class="text-center" style="width: 25%;">{{ $Booking[0]->FirstName.' '.$Booking[0]->LastName }}</td>
                        <td class="text-center" style="width: 25%;">{{ ($Booking[0]->PaymentStatus == 1 ? $Booking[0]->DateModified : 'Unpaid') }}</td>
                        <td class="text-center" style="width: 25%;">{{ ($Booking[0]->PaymentStatus == 1 ? 'Paid' : 'Unpaid') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div style="background: #f5f5f5;padding: 25px 10px;border: 1px solid #ddd;">
                    <p style="margin: 0;font-size: 11px;"><b style="font-size: 15px;">Booking Issued To</b></p>
                    <table>
                        <tr>
                            <td style="width:30%;">Name:</td>
                            <td>{{ $Booking[0]->FirstName.' '.$Booking[0]->LastName }}</td>
                        </tr>
                        <tr>
                            <td>Cell:</td>
                            <td>{{ $Booking[0]->Cell }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ $Booking[0]->Email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-xs-6">
                <div style="background: #f5f5f5;padding: 25px 10px;border: 1px solid #ddd;">
                    <p style="margin: 0;font-size: 11px;"><b style="font-size: 15px;">Booking Issued By</b></p>
                    <table>
                        <tr>
                            <td colspan="2">KTown Rooms</td>
                        </tr>
                        <tr>
                            <td style="width:30%;">Phone No.:</td>
                            <td>+92(311) 1222 418</td>
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
                        <th>Hotel</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Guests</th>
                        <th>Rooms</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach($hotel as $hotels)
                    <tr style="background: #f5f5f5;">
                        <td>{!! $hotels->HotelName.(isset($hotels->HotelClass) ? ' ('.$hotels->HotelClass.')' : '') !!}</td>
                        <td>{{ $hotels->CheckInDate }}</td>
                        <td>{{ $hotels->CheckOutDate }}</td>
                        <td>{{ ($hotels->Adults + $hotels->Children) }}</td>
                        <td>{{ $hotels->RoomQty }}</td>
                        <td>PKR {{ number_format($hotels->SellingPrice , 0) }} X nights</td>

                    </tr>
                    <tr>
                        <td style="border: none !important;" colspan="5" >Discount:</td>
                        <td class="" style="background: #f5f5f5;">PKR {{ number_format($Booking[0]->Discount, 0) }}</td>
                    </tr>
                    <tr>
                        <td style="border: none !important;" colspan="5">Promo Discount:</td>
                        <td class="" style="background: #f5f5f5;">PKR {{ number_format($Booking[0]->PromoDiscount, 0) }}</td>
                    </tr>
                    <tr>
                        <td style="border: none !important;" colspan="5">Total: </td>
                        <td class="" style="background: #f5f5f5;"><b style="font-size: 15px;">PKR {{ number_format($hotels->Total , 0) }}</b></td>
                    </tr>
                    @endforeach

                    <tr>
                        <td style="border: none !important;" colspan="5">All Total: <span style="font-size: 10px;font-weight: 800;text-transform: uppercase;">{{ $Booking[0]->TotalAmountInWords }} Only</span></td>
                        <td class="" style="background: #f5f5f5;"><b style="font-size: 15px;">PKR {{ number_format($Booking[0]->TotalAmount, 0) }}</b></td>
                    </tr>
                </table>
                <p style="margin: 0;font-size: 11px;display:none;">Note: This hotel run under "{{ $hotel[0]->OwnerName }}" trade agreement and KTown standards.</p>
            </div>
        </div>
        <br /> <br />
    </div>
</body>

</html>
