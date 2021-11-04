<?php
$start_date = str_replace("/", "-", $hotel[0]->CheckInDate);
$end_date = str_replace("/", "-", $hotel[0]->CheckOutDate);

$start_date = new DateTime(date('Y-m-d', strtotime($start_date)));
$end_date = new DateTime(date('Y-m-d', strtotime($end_date)));

$nights = $end_date->diff($start_date)->format("%d");
$nights = $nights > 0 ? $nights : 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Ktown Rooms." />
    <title>Booking | Confirmation</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon" />
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
    <div class="" style="width: 800px;background: #fff; margin: 0 auto;">
        <div class="" style="padding-top: 60px; float: left;">
            <div class="" style="width: 50%;float: left;">
                <div style="padding-top: 30px;">
                    <img src="{{ url('resources/assets/web/img/logo.png') }}" />
                </div>
            </div>
            <div class="" style="width: 50%;float: left;">
                <h3 style="font-size: 28px;margin: 4px 0;">Head Office</h3>
                <table style="width: 100%;">
                    <tr>
                        <td style="width:50%"><b style="font-size: 15px;">Address:</b></td>
                        <td>73C Jami Commercial Phase VII DHA Karachi</td>
                    </tr>
                    <tr>
                        <td><b style="font-size: 15px;">Phone No.:</b></td>
                        <td>(92)-311-1222418</td>
                    </tr>
                    <tr>
                        <td><b style="font-size: 15px;">Website:</b></td>
                        <td>www.ktownrooms.com</td>
                    </tr>
                </table>
            </div>
        </div>
        <hr style="border-color: #ea873a; margin-top: 1rem;margin-bottom: 1rem; border-top: 1px solid rgb(0 0 0 / 0%);" />
        <div class="" style="float: left;">
            <div class="">
                <table class="table" style="border: none !important; width: 100%;">
                    <tr style="border: none !important;">
                        <td style="border: none !important;width: 50%;"><b style="width: 100px; display: inline-block;font-size: 15px;">Hotel Name:</b> {{ $hotel[0]->HotelName }}<br><b style="width: 100px; display: inline-block;font-size: 15px;">Hotel Address:</b>{{$hotel[0]->Address2}}
                        </td>
                        <td style="border: none !important;font-size:11px;width: 50%;">
                            <!--<div style="background: #ea873a;color: #fff;padding: 12px;margin: 10px !important;">Help Line No.: (92)-311-1222418</div>-->
                        </td>
                    </tr>
                </table>
                <div class="">
                    <img  src="{{ url('public/uploads/website/maps') . '/' . $Booking[0]->map_image}}" alt="" style="width: 100%;max-width: 100%;object-fit: unset">
                </div>
                <hr style="border-color: #ea873a;" />
                <table class="table " style="border-collapse: collapse; width: 100%;">
                    <tr>
                        <td class="" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">Booking #</td>
                        <td class="" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">Customer</td>
                        <td class="" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">Paid On</td>
                        <td class="" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">Status</td>
                    </tr>
                    <tr style="background: #f5f5f5;">
                        <td class="text-center" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">{{ $Booking[0]->BookingCode }}</td>
                        <td class="text-center" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">{{ $Booking[0]->FirstName.' '.$Booking[0]->LastName }}</td>
                        <td class="text-center" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">{{ ($Booking[0]->PaymentStatus == 1 ? $Booking[0]->DateModified : 'Unpaid') }}</td>
                        <td class="text-center" style="width: 25%;border: 1px solid #ddd; text-align: center;border-collapse: collapse; padding: 5px; ">{{ ($Booking[0]->PaymentStatus == 1 ? 'Paid' : 'Unpaid') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="" style="float: left; width:100%;">
            <div class="col-xs-6" style="width: 48%;float: left; margin: 20px 0;padding-right: 15px;">
                <div style="background: #f5f5f5;padding: 25px 10px;border: 1px solid #ddd; height: 120px;">
                    <p style="margin: 0;font-size: 11px;"><b style="font-size: 15px;">Booking Issued To</b></p>
                    <table style="width: 100%;">
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
            <div class="col-xs-6" style="width: 48%;float: right;margin: 20px 0;">
                <div style="background: #f5f5f5;padding: 25px 10px;border: 1px solid #ddd; height: 120px;">
                    <p style="margin: 0;font-size: 11px;"><b style="font-size: 15px;">Booking Issued By</b></p>
                    <table style="width: 100%;">
                        <tr>
                            <td colspan="2">KTown Rooms</td>
                        </tr>
                        <tr>
                            <td style="width:30%;">Phone No.:</td>
                            <td>(92)-311-1222418</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{$BookingEmail}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br />
        <div class="" style="">
            <div class="">
                <table class="table" style="margin-bottom:2px; border-collapse: collapse;border: 1px solid #ddd; width: 100%;">
                    <tr style="background: #ea873a;
                            color: #fff; text-align:center">
                        <th style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">Hotel</th>
                        <th style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">Check In - Check Out Date</th>
                        <!--<th style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">Check Out</th>-->
                        <th style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">Guests</th>
                        <th style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;"> Rooms</th>
                        <th style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">Subtotal</th>
                    </tr>
                    @foreach($hotel as $hotels)
                    <tr style="background: #f5f5f5; text-align:center">
                        <td style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">{!! $hotels->HotelName !!}</td>
                        <td style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">{{ $hotels->CheckInDate }} - {{ $hotels->CheckOutDate }}</td>
                        <!--<td style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">{{ $hotels->CheckOutDate }}</td>-->
                        <td style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">{{ ($hotels->Adults + $hotels->Children) }}</td>
                        <td style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">{{ $hotels->RoomQty }}</td>
                        <td style="border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">PKR {{ number_format($hotels->SellingPrice , 0) }} x {{$nights}} nights</td>

                    </tr>
                    <?php if ($Booking[0]->Discount > 0) {?>
                    <tr style="text-align:center">
                        <td style="border: none !important; padding: 5px 8px;" colspan="4">Discount:</td>
                        <td class="" style="background: #f5f5f5; border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">PKR {{ number_format($Booking[0]->Discount, 0) }}</td>
                    </tr>
                    <?php } ?>

                    <?php if ($Booking[0]->PromoDiscount > 0) { ?>
                    <tr style="text-align:center">
                        <td style="border: none !important; padding: 5px 8px;" colspan="4">Promo Discount:</td>
                        <td class="" style="background: #f5f5f5; border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">PKR {{ number_format($Booking[0]->PromoDiscount, 0) }}</td>
                    </tr>
                    <?php } ?>

                    <?php if ($hotels->AdditionalCharges > 0) { ?>
                    <tr style="text-align:center">
                        <td style="border: none !important; padding: 5px 8px;" colspan="4">Additional Guest Charges: <?php echo $hotels->AdditionalOccupants . ' @ ' . $hotels->AdditionalRate; ?></td>
                        <td class="" style="background: #f5f5f5; border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;">PKR {{ number_format($hotels->AdditionalCharges, 0) }}</td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td style="border: none !important; padding: 5px 8px;" colspan="4">Sub Total: </td>
                        <td class="" style="text-align:center;background: #f5f5f5; border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;"><b style="font-size: 15px;">PKR {{ number_format($hotels->Total , 0) }}</b></td>
                    </tr>
                    @endforeach

                    <tr>
                        <td style="border: none !important; padding: 5px 8px;" colspan="4">Grand Total (in words) Rupees {{ $Booking[0]->TotalAmountInWords }} Only</td>
                        <td class="" style="text-align:center;background: #f5f5f5; border: 1px solid #ddd; border-collapse: collapse; padding: 5px 8px;"><b style="font-size: 15px;">PKR {{ number_format($Booking[0]->TotalAmount, 0) }}</b></td>
                    </tr>
                </table>
                <p style="margin: 0;font-size: 11px;">*All prices are inclusive of tax</p>
            </div>
        </div>
        <br /> <br />
    </div>
</body>

</html>