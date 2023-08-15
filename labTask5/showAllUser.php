<?php
require_once 'userInfo.php';
include 'nav.php';
$users = fetchAllUsers();
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
    <h2 style="text-align: center">All User Information</h2>
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
            <th>Action</th>

        </tr>
        <tbody>
            <?php foreach ($users as $i => $user) : ?>
                <tr>
                    <td> <a href="showUser.php?id=<?php echo $user['ID'] ?>"><?php if (isset($user['name'])) echo $user['name'] ?></a></td>
                    <td><?php if (isset($user['Name'])) echo $user['Name']; ?></td>
                    <td><?php if (isset($user['Email'])) echo $user['Email']; ?></td>
                    <td><?php if (isset($user['Password'])) echo $user['Password']; ?></td>
                    <td><?php if (isset($user['Gender'])) echo $user['Gender']; ?></td>
                    <td><?php if (isset($user['BloodGroup'])) echo $user['BloodGroup']; ?></td>
                    <td><?php if (isset($user['Phone'])) echo $user['Phone']; ?></td>
                    <td><?php if (isset($user['Address'])) echo $user['Address']; ?></td>
                    <td><a href="editUser.php?id=<?php echo $user['ID'] ?>">Edit</a>&nbsp;<a href="deleteUser.php?id=<?php echo $user['ID'] ?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>