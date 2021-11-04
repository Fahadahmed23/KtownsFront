@extends('layouts.default')
@section('title', 'About us | Comfortable & stylish budget hotels in Pakistan') 
@section('description', 'Ktown Rooms is providing reasonable hospitality services across Pakistan. Our customers avail best services of hotels and guest houses at low prices guaranteed')
@section('content')
@include('includes/dashboard-header')
<section class="das-content w-100 ofh">
    <div class="row m-0">
        @include('includes/dashboard-left-sidebar')
        <div class="col-lg-6 p-0">
            <div class="das-main-content-area">
                <div class="con-head prpx-10 plpx-10">
                    <img src="{{ url('resources/assets/web') }}/img/dashboard/booking-icon.jpg" alt="*" class="float-left" />
                    <h3 class=" p-0 fspx-22 fc-dark lh-xlarge"> My Payments</h3>
                    <!-- <p class="fspx-12">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
                </div>
                <div class="general">
                    <div class="">
                        <div class="credit-info mlpx-10 mrpx-10 mtpx-20">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                Session::forget('success');
                                @endphp
                            </div>
                            @endif
                            {!! Form::open(['url' => 'my-payments','class'=>'sp-table']) !!}        
                            <div class="form-group">
                                <label class ="fspx-14" for="usr">Name on Card</label>
                                {!! Form::text('NameOnCard', $User->NameOnCard, ['class' => 'form-control h-35', 'id' => 'NameOnCard', 'placeholder' => 'Name On Card']) !!}
                            </div>

                            <div class="form-group ">
                                <label class ="fspx-14 d">Card Number</label>
                                <div class="d-flex">
                                    {!! Form::text('CardNumber', $User->CardNumber, ['class' => 'form-control w-50 h-35', 'id' => 'CardNumber', 'placeholder' => 'Card Number','maxlength' => '16','pattern'=>'\d*']) !!}
                                    <img src="{{ url('resources/assets/web') }}/img/dashboard/cards-img.png" alt="*" class="mlpx-30" />  
                                </div>

                            </div>
                            <div class="form-group">
                                <label class ="fspx-14 d">Expiration Date</label>
                                <div class="d-flex">
                                    {!! Form::text('ExpiryMonth', $User->ExpiryMonth, ['class' => 'form-control w-60 h-35', 'id' => 'ExpiryMonth', 'placeholder' => 'MM']) !!}
                                    {!! Form::text('ExpiryYear', $User->ExpiryYear, ['class' => 'form-control w-70 h-35 mlpx-15', 'id' => 'ExpiryYear', 'placeholder' => 'Year']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class ="fspx-14">Security Code</label>
                                <div class="d-flex">
                                    {!! Form::text('CCV', $User->CCV, ['class' => 'form-control w-60 h-35', 'id' => 'CCV', 'placeholder' => 'CCV','maxlength' => '4']) !!}
                                    <img src="{{ url('resources/assets/web') }}/img/dashboard/icon-ccv.png" alt="*" class="mlpx-10" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" value="Save" class="btn_1" id="submit-contact">
                                </div>
                            </div>
                            {!! FORM::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes/dashboard-right-sidebar')
    </div>
</section>
<style>
    .btn_1, a.btn_1 {
        border: none;
        font-family: inherit;
        color: #fff;
        background: #ea873a;
        cursor: pointer;
        padding: 7px 20px;
        display: inline-block;
        outline: 0;
        font-size: 12px;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-transform: uppercase;
        font-weight: 700;
    }   
</style>

@stop