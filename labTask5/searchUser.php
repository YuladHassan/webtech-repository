<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="findUser.php">
        <h1>SEARCH FOR USERS</h1>
        <input type="text" name="name" />
        <input type="submit" name="findUser" value="Search" />
    </form>
</body>

</html>