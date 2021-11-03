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
        <h2>New User</h2>
        <p>Dear Admin,</p><p>Below are the new user details: </p>
        <table>
            <tr>
                <th>First name: </th>
                <td>{{ $FirstName }}</td>
            </tr>
            <tr>
                <th>Last name: </th>
                <td>{{ $LastName }}</td>
            </tr>
            <tr>
                <th>Cell: </th>
                <td>{{ $Cell }}</td>
            </tr>
            <tr>
                <th>Email Address: </th>
                <td>{{ $EmailAddress }}</td>
            </tr>
        </table>
    </body>
</html>
