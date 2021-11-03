<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>K Town Rooms</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                font-size:12px;
            }
            table {
                width:50%;
            }
        </style>
    </head>

    <body>
        <h2>Booking Canceled</h2>
        <p>Dear Admin,</p>
        <p>Booking id: {{ $BookingID }} has been canceled by user, please login to check details<br /><a href="{{ url('admin/bookings') }}">Check Details</a></p>
    </body>
</html>
