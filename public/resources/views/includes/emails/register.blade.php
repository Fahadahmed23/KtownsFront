<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>K Town Rooms</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                font-size:12px;
            }
        </style>
    </head>

    <body>
        <p>Dear {{ $FirstName.' '.$LastName }},</p>
        <p>Please find Activation Code below</p>
        <p>{{ $VerificationLink }}</p>
    </body>
</html>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>K Town Rooms</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                font-size:12px;
                background: #f5f5f5;
                color: #3d3e3e;
                width: 100%;
                height:100%;
            }
            .container {
                width: 50%;
                background: #fff;
                margin:0 auto;
                padding:25px;
            }
            .border {
                border: 1px solid #f5f5f5;
                height: 0px;
                width: 100%;
                border-top: 0;
                margin: 20px 0;
            }
            .blue-text {
                font-size: 18px;
            }
            a.activate-link {
                background: #ec914d;
                display: block;
                padding:10px 0;
                width: 100%;
                color: white;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
            }
            .my-details {
                background: #f5f5f5;
                padding: 20px 20px 0 20px;
                margin-top: 20px;
            }
            a.mailto {
                color: #ec914d;
                text-decoration: none;
            }
            .my-details h3 {
                font-size: 18px;
            }
            .my-details p {
                font-size: 16px;
            }
            .my-details img {
                width: 150px;
                float: right;
            }
            .left {
                width: 50%;
                float: left;
            }
            .right {
                width: 50%;
                float: right;
            }
            .clear {
                clear: both;
            }
            @media (max-width: 960px) {
                .container {
                    width: 90%;
                    background: #fff;
                    padding:25px;
                }
                .my-details {
                    padding: 10px 0px 0 10px;
                }
                .my-details h3 {
                    font-size: 16px;
                }
                .my-details p {
                    font-size: 14px;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <!--        <img src="{{ url('resources/assets/web/img/logo.png') }}" />-->
            <img src="{{ url('resources/assets/web/img/logo.png') }}" />
            <div class="border"></div>
            <p class="blue-text">Dear User,</p>
            <p class="blue-text">Thank you for registration in <b>K-Town Rooms</b>, all we need to confirm your email by clicking here, before you can start enjoying the best and most seamless room booking experience ever!</p>
            <a class="activate-link" href="{{ $VerificationLink }}">Click here to verify your email</a>
            <div class="my-details">
                <div class="left">
                    <h3>Your Room Advisor</h3>
                    <p>Email: <a class="mailto" href="mailto:info@ktownrooms.com">info@ktownrooms.com</a></p>
                </div>
                <div class="left">
                    <img src="{{ url('resources/assets/web/img/call-centre.png') }}" />
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>

