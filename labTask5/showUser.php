<?php
require_once 'userInfo.php';

$user = fetchUser($_GET['id']);


include "nav.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table.center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <table class="center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Phone Number</th>
            <th>Address</th>
        </tr>
        <tr>
            <td><a href="showUser.php?id=<?php echo $user['ID'] ?>"><?php echo $user['Name'] ?></a></td>
            <td><?php echo $user['ID'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['password'] ?></td>
            <td><?php echo $user['gender'] ?></td>
            <td><?php echo $user['bloogGroup'] ?></td>
            <td><?php echo $user['phone'] ?></td>
            <td><?php echo $user['address'] ?></td>
        </tr>
    </table>
</body>

</html>