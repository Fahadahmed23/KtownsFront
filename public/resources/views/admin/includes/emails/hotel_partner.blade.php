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
            table tr th {
                text-align: left;
                width: 25%;
            }
        </style>
    </head>

    <body>
        <h2>Hotel Partner Details</h2>
        <p>Dear Admin,</p><p>Below are the Hotel Partner Details: </p>
        <table border="1">
            <tr>
                <th>Full Name: </th>
                <td>{{ $FullName }}</td>
            </tr>
            <tr>
                <th>Hotel Name: </th>
                <td>{{ $HotelName }}</td>
            </tr>
            <tr>
                <th>Email Address: </th>
                <td>{{ $EmailAddress }}</td>
            </tr>
            <tr>
                <th>Contact No: </th>
                <td>{{ $ContactNo }}</td>
            </tr>
            <tr>
                <th>Location: </th>
                <td>{{ $Location }}</td>
            </tr>
            <tr>
                <th>No. of Rooms: </th>
                <td>{{ $NoOfRooms }}</td>
            </tr>
            <tr>
                <th>Description: </th>
                <td>{{ $Description }}</td>
            </tr>
        </table>
    </body>
</html>
