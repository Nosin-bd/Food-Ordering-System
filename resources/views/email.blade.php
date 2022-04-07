<!DOCTYPE html>
<html>
<head>
    <title>food ordering system</title>
</head>
<body>

    <table>
        <tr>
            <th>Name:</th>
            <td>{{ $details['name'] }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $details['email'] }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $details['phone'] }}</td>
        </tr>
        <tr>
            <th>Message:</th>
            <td>{{ $details['message'] }}</td>
        </tr>
    </table>

    <p>Thank you</p>
</body>
</html>
