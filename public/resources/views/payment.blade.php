@extends('layouts.default')
@section('title', 'KTown Rooms | Pakistan Best Budget Hotels, Lowest Price Guaranteed') 
@section('description', 'Book budget hotels in Pakistan Starting PKR 2500+ Offering cheap hotels in 50+ cities across Pakistan, 1000 + AC rooms with breakfast, wifi, etc ✓pay at hotel')
@section('content')
@include('includes/payment-header')
<style type="text/css">
    .termsNconditons {
    width: 100%;
    height: 200px;
    overflow: scroll;
}
p.c-txt {
    color: #8f8f8f;
    line-height: 1.2;
    display: inline-block;
    position: relative;
    top: 5px;
    left: 5px;
}
.key-check label{
    width: 0;
}
.key-check h4{
    font-size: 20px;
    font-weight: 700;
}
.booking-left-content p{
    font-size: 12px;
    color: #000;
}
</style>
<section class="book-content-main">
    <div class="container">
        {!! Form::open([ 'url' => 'book']) !!}
        <div class="row">
            <div class="col-lg-8">
                @include('includes/front_alerts')
                <div class="booking-left-content">
                    <h3>Your Details</h3>
                   <!--  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
                    <div class="col-lg-11 p-0">
                        <?php
                        if (\Session::has('IsAdminCorporate') && \Session::get('IsAdminCorporate') == 1) {
                            ?>
                            <div class="book-easy-form row">
                                <div class="form-group col-lg-6">
                                    <label>First name</label>
                                    {!! Form::text('FirstName', \Session::get('FirstName'), ['class' => 'form-control', 'id' => 'FirstName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last name</label>
                                    {!! Form::text('LastName', \Session::get('LastName'), ['class' => 'form-control', 'id' => 'LastName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    {!! Form::text('EmailAddress', \Session::get('EmailAddress'), ['class' => 'form-control', 'id' => 'EmailAddress']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cell</label>
                                    {!! Form::text('Cell', \Session::get('Cell'), ['class' => 'form-control', 'id' => 'Cell']) !!}
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="book-easy-form row">
                                <div class="form-group col-lg-6">
                                    <label>First name</label>
                                    {!! Form::text('FirstName', \Session::get('FirstName'), ['class' => 'form-control', 'id' => 'FirstName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last name</label>
                                    {!! Form::text('LastName', \Session::get('LastName'), ['class' => 'form-control', 'id' => 'LastName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    {!! Form::text('EmailAddress', \Session::get('EmailAddress'), ['class' => 'form-control', 'id' => 'EmailAddress']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cell</label>
                                    {!! Form::text('Cell', \Session::get('Cell'), ['class' => 'form-control', 'id' => 'Cell']) !!}
                                </div>
                            </div>
                            <?php } ?>
                            <hr>
                            <!-- <h3 class="m-0">Add on to your booking</h3>
                            <p>- for a more comfortable experience:</p> -->

                            
                            <div class="termsNconditons">


                                <div class="key-check" id="policy">
                                        <h4>Terms & Conditions</h4>
                                        <p>These terms of service constitute a legally binding agreement (the “Agreement”) between you and “Kaabil Technology Services” or “KTown Rooms” and your use of the website is an acknowledgment that you have reviewed the terms and Conditions and agree to comply with and be legally bound thereby. The expression includes and permitted assigns governing your (user) use of the of the “KTown Rooms platform”. The “KTown Rooms Platform” and all rights therein are and shall remain Kaabil Technology Services property. Neither this Agreement nor your use of the “KTown Rooms Platform” convey or grant to you any rights; to use or reference in any manner Kaabil Technology Services company names, logos, product and service names, trademarks or services.

                                        If you are not agreeable to all the usage terms in their entirety, you must not use this site and should exit/logout immediately. By accessing, viewing, or using this Website/ Application, You acknowledge, declare, confirm and represent & warrant to “KTown Rooms” that you have read and understood the Usage Terms and accept them as an agreement as the binding legal contract equivalent of a duly signed contract binding on You. This agreement is effective immediately upon your accessing, viewing, or using this Website/ Application. You are advised to regularly check for any amendments or updates to the Usage Terms mentioned herein from time to time. KTown Rooms may add to or change, update these Usage Terms from time to time entirely at its sole discretion. Your use of the Website/ Application and any amendment to the Usage Terms shall constitute your acceptance of these Usage Terms and you agree to be bound by any such changes/revisions/amendments.
                                    </p>
                                    <p> 
                                        <b style="color:#000;">Please also read these terms to acquire further clarity in agreement:</b>
                                        <br>
                                        Kaabil Technology Services, a company incorporated under the laws of Pakistan having its registered office at University road, karachi, operates as a budgeted hotel chain model “KTown Rooms” through its website (Ktownrooms.com) for temporary accommodation. Please note ‘KTown Rooms website is an online marketplace where Users can meet and interact with Guest Houses/Hotels (collectively as “Channel Partner”) for their Bookings/transactions. Channel Partners list their Guest Houses, Hotels, properties and other lodgings ("collectively, the “Accommodations") on the Website and User reserves the Accommodation at the prices specified by the Channel partner on the Website. KTown Rooms hereby clarifies and the User agrees and understands that ‘KTown Rooms’ is not the owner of the Accommodations and will not be liable for any services or lack of them at the Accommodations booked by the User. It is hereby further clarified that KTown Rooms and Channel Partners are separate and independent entities and KTown Rooms does not work as representative or agent of the Channel Partner. By making a reservation/booking at the listed Accommodations the User enters into commercial/ contractual terms as offered by and agreed to between Channel Partner and the User alone.
                                        You hereby agree and warrant that you are at least eighteen years of age and are capable of entering, performing and adhering to these usage terms and that you are bound by these usage terms. While those who are under the age of 18 may utilize or browse the site by the involvement, guidance and supervision of their parents/ guardians, under parents/guardians registered account. Furthermore, KTown Rooms has right at its sole discretion to refuse or terminate the access of any user/person whatsoever with or without notice.
                                        KTown Rooms shall not be responsible for unsatisfactory or delayed performance of services or damages or delays as a result of Channel Partner’s act’s or omissions.
                                        The User hereby assumes the sole risk of booking or making use or relying on the information relating to the Services available on this Website/ Application. KTown Rooms does not promote any Accommodations listed on the Website/ Application. It is User’s responsibility to check the details of the Accommodations listed on the Website/ Application at its sole discretion.
                                        Further, KTown Rooms shall not be held responsible for non-availability of the Website/ Application during periodic maintenance operations or any unplanned suspension of access to the Website/ Application that may occur due to technical reasons or for any reasons beyond KTown Rooms’ control.
                                        Guest must use his own credit/debit card for any payments to KTown Rooms website or in KTown Rooms partner hotels. The KTown rooms shall not be liable for any credit/debit card fraud. The liability to use a card fraudulently would be on the guest and the onus to ‘prove otherwise’ shall be exclusively on guest.
                                        The User agrees, acknowledges and confirms that before placing any order, the User shall check the Service description and price carefully and by placing an order for a Service You agree to be bound by the Usage Terms and conditions of sale included in the Services’ description. You shall only place the order after fully satisfying yourself with the price, description, look as has been displayed on KTown Rooms Website/Application.
                                        KTown Rooms shall not be responsible and shall not be required to mediate or resolve any dispute or disagreement between User and Channel Partner. In no event, shall KTown Rooms be made a party to dispute between User(s) and Channel Partner(s).
                                        Your use of the Services shall be deemed that you are fully satisfied with the description, look and design of the accommodation and usage fee of the Accommodation as has been displayed on Ktown Room's Website/ Application.
                                        Ktown Rooms makes the services available to user through the website only if user provide Ktown Rooms required User information through creating an account (“Account”) Via  Ktown Rooms ID and Password or other log-in ID and Password (collectively, the “Account Information”). We only provide you services once you register as a User, and the sole responsibility of maintaining confidentiality of the account information on You (User). We “Ktown Rooms” shall not be liable for any loss or damage done due to lack of confidentiality of Account information.
                                        The Services are provided by Ktown Rooms on an "as is" basis without warranty of any kind, to User.
                                        These terms will be interpreted in accordance with the laws of the Pakistan. You (User) and we (KTown Rooms) agree to submit to the exclusive jurisdiction of a court located in Karachi for any dispute, claim or actions in relation to these terms or the use of services provided through ktownrooms.com
                                    </p>
                                </div>


                               
                            </div>
                             <hr class="mb-50" style="margin-bottom: 10px;">
                                <input type="checkbox" name="PrivacyCheckbox" style="float: left;width: 25px;margin: 5px  0 25px 0;">
                                <b>
                                <p class="c-txt" style="color:#000;">I accept terms and conditions and general policy.<br></p>
                                </b> 
                                <button type="submit" class="btn-org d-inline">Book now</button>
                        
                    </div>

                </div>
            </div>
            <?php
                $Adults = 0;
                $Children = 0;
                $TotalGuests = 0;
                $TotalRooms = 0;
                $TotalNights = 0;
                $TotalCost = 0;
                if (\Session::has('RoomsCart') && count(\Session::get('RoomsCart')) > 0) {
                    foreach (\Session::get('RoomsCart') as $session) {
                        $Adults += $session['Adults'];
                        $Children += $session['Children'];
                        $TotalGuests += ($session['Adults'] + $session['Children']);
                        $TotalRooms += $session['Rooms'];
                        $TotalNights += $session['TotalNights'];
                        $TotalCost += $session['Total'];
                    }
                }
                ?>
            <div class="col-lg-4">
                <div class="booking-right-content">
                    <h3 class="sp-heading mb-15"><?php echo $session['HotelName']; ?></h3>
                    <p>Check-in: <?php echo date_format(date_create($session['HotelCheckInDate']), 'd-m-Y'); ?></p>
                    <p>Check-out: <?php echo date_format(date_create($session['HotelCheckOutDate']), 'd-m-Y'); ?></p>
                    <p class="pbpx-15"><?php echo $TotalNights ?> Night</p>

                    <!-- <p class="pbpx-15"><?php //echo $TotalGuests ?> Guest &nbsp;&nbsp; <?php //echo $TotalRooms ?> Room  <span>Rs: 4,600</span></p> -->
                    <p class="pbpx-15"><?php echo $TotalGuests ?> Guest &nbsp;&nbsp; <?php echo $TotalRooms ?> Room  <span class="ff-sec">Rs: <?php echo number_format((($TotalCost / $TotalNights)/ $TotalRooms), 0)  ?>* /<small>Night</small></span></p>

                    <?php
                        $PromoDiscount = 0;
                        if (\Session::has('PromoApplied')) {
                            $PromoDiscount = ($TotalCost * \Session::get('PromoDiscount') / 100);
                            ?>
                            <p class="fc-dark fw-semi-bold">Included</p>
                            <p class="pb-2">Promo Discount... <span>PKR <?php echo number_format($PromoDiscount, 0); ?></span></p>
                            <?php
                        }
                        ?>
                    <hr class="b-hr ">
                    <div class="mt-20">
                        <h3 class="sp-heading mb-15 float-left">Total</h3>
                        <div class="prc-box float-right text-right">
                            <h4><small>PRICE:</small>RS <?php echo number_format($TotalCost - $PromoDiscount, 0); ?>*</h4>
                            <!-- <span>/NIGHT</span> -->
                            <p>inclusive of all charges and fees</p>
                        </div>
                    </div>
                    <div class="btn-pay">
                        <a href="javascript:;" alt="*" class="check-icon mr-3">Pay With Credit Card</a>
                        <a href="javascript:;" alt="*" class="check-icon">Pay @ Hotel</a>
                    </div>
                    <!-- <a href="javascript:;" class="btn-org">Book Now</a> -->
                </div>
                <div class="info-bx">
                    <p>If you have any question please don‘t hesitate to contact us</p>
                        <a href="tel:+92(311) 1222 418"><p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo "+92(311) 1222 418" ?></p></a>
                         <a href="tel:{{ $configuration->Contact1 }}"><p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo $configuration->Contact1; ?></p></a>
                         <a href="mailto:{{ $emails->SupportEmail }}"><p><span class="icon-envelope2 mr-1"></span> {{ $emails->SupportEmail }}</p></a>
                </div>
            </div>
        </div>
        {!! FORM::close() !!}
    </div>
</section>

<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function()   
{
    $('#Cell').mask('0000 000-0000');
})
</script>
@stop
@section('myjsfile')

@stop