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
                <div class="profile-header text-center">
                    <figure class="d-table m-auto" ><img src="{{ url('resources/assets/web/img/dashboard/profile-img.png') }}" alt="*" /></figure>
                    <h3 class="fspx-24 p-0 fc-dark">{{ ucfirst($User->FirstName).' '.ucfirst($User->LastName) }}</h3>
                </div>
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
                
                {!! Form::open(['url' => 'user-profile','class' => 'w-70 m-auto']) !!}
                <div class="form-group">
                    <label class ="fspx-14" for="usr">First Name</label>
                    {!! Form::text('FirstName', $User->FirstName, ['class' => 'form-control', 'id' => 'FirstName', 'placeholder' => 'First Name']) !!}
                </div>

                <div class="form-group">
                    <label class ="fspx-14" for="usr">Last Name</label>
                    {!! Form::text('LastName', $User->LastName, ['class' => 'form-control', 'id' => 'LastName', 'placeholder' => 'Last Name']) !!}
                </div>

                <div class="form-group">
                    <label class ="fspx-14" for="usr">Email Address</label>
                    {!! Form::text('EmailAddress', $User->EmailAddress, ['class' => 'form-control', 'id' => 'EmailAddress', 'placeholder' => 'Email Address', 'readonly' => 'readonly']) !!}
                </div>

                <div class="form-group">
                    <label class ="fspx-14" for="usr">Cell</label>
                    {!! Form::text('Cell', $User->Cell, ['class' => 'form-control', 'id' => 'Cell', 'placeholder' => 'Cell', 'readonly' => 'readonly']) !!}
                </div>

                <div class="form-group">
                    <label class ="fspx-14">Password </label> ( Leave blank if you don't want to modify )
                    {!! Form::password('Password', ['class' => 'form-control', 'id' => 'Password', 'placeholder' => 'Password']) !!}
                </div>

                <div class="form-group">
                    <label class ="fspx-14" for="usr">Confirm Password</label>
                    {!! Form::password('CPassword', ['class' => 'form-control', 'id' => 'CPassword', 'placeholder' => 'Confirm Password']) !!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Save" class="btn_1" id="submit-contact">
                    </div>
                </div>
                {!! FORM::close() !!}
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
@endsection

