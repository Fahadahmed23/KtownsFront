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
        <h2>Travel Agent Details</h2>
        <p>Dear Admin,</p><p>Below are the Travel Agent Details: </p>
        <table border="1">
            <tr>
                <th>Full Name: </th>
                <td>{{ $FullName }}</td>
            </tr>
            <tr>
                <th>Address: </th>
                <td>{{ $Address }}</td>
            </tr>
            <tr>
                <th>City: </th>
                <td>{{ $City }}</td>
            </tr>
            <tr>
                <th>Email: </th>
                <td>{{ $Email }}</td>
            </tr>
            <tr>
                <th>Cell: </th>
                <td>{{ $Cell }}</td>
            </tr>
        </table>
    </body>
</html>
