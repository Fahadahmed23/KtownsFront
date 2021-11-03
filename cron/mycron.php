<?php

include("includes/dbconfig.php");
include("includes/common.php");

//mysqli_query($link, "INSERT INTO testing SET mytest = 'ameen'");

$data = mysqli_query($link, "SELECT * FROM bookings WHERE Status = 1");

while ($row = mysqli_fetch_assoc($data)) {
     //sending welcome message
//    $for_welcome_msg = mysqli_query($link, "SELECT * FROM booking_hotels WHERE BookingID = " . $row['BookingID'] . " AND DATE_FORMAT(CheckInDate, '%d-%m-%y') =  DATE_FORMAT(NOW(), '%d-%m-%y')");
    $for_welcome_msg = mysqli_query($link, "SELECT * FROM booking_hotels WHERE BookingID = " . $row['BookingID'] . " AND DATE_FORMAT(CheckInDate, '%d-%m-%y') =  DATE_FORMAT(NOW(), '%d-%m-%y')");
    while ($row2 = mysqli_fetch_assoc($for_welcome_msg)) {
        //mysqli_query($link, "INSERT INTO testing SET mytest = 'ameen2'");
        // send sms
        $to = $row['Cell'];
        $message = 'Welcome to KTown Rooms, Have a Good Experience'
                . 'Thanks';
        $url = "http://Lifetimesms.com/plain?username=" . $smsUsername . "&password=" . $smsPassword . "&to=" . $to . "&from=" . urlencode($smsFrom) . "&message=" . urlencode($message) . "";

        $ch = curl_init();
        $timeout = 30;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $response = curl_exec($ch);
        curl_close($ch);
        // send sms end
    }
     //sending email for feedback
    $for_feedback_mail = mysqli_query($link, "SELECT * FROM booking_hotels WHERE BookingID = " . $row['BookingID'] . " AND DATE_FORMAT(CheckOutDate, '%d-%m-%y') =  DATE_FORMAT(NOW(), '%d-%m-%y')");
    while ($fbrow = mysqli_fetch_assoc($for_feedback_mail)) {
        $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 50);
        $token = $row['BookingID'] . '_' . $rand;

        mysqli_query($link, "UPDATE bookings SET FeedbackToken = '" . $token . "' WHERE BookingID = " . $row['BookingID'] . "");

        $Heade = "info@ktownrooms.com";
        $Subject = 'KTown Rooms Feedback';
        $Header = "From: " . strip_tags($Heade) . "\r\n";
        $Header .= "MIME-Version: 1.0\r\n";
        $Header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $toEmail = $row['Email'];
        $Content = 'Please provide us your valuable feedback.<br>Thanks.<br>'
                . 'Click this link to give feedback. <a href="' . $domain . '/feedback/' . $token . '">Click here</a><br>';

        $mail = @mail($toEmail, $Subject, $Content, $Header);
    }
}