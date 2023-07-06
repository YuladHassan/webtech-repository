<?php
session_start();
include 'header2.php';
if (!empty($_POST['remember'])) {
    setcookie("name", $_POST['name'], time() + 10);
    setcookie("password", $_POST['password'], time() + 10);
    echo "Cookie set successfully";
} else {
    setcookie("name", "");
    setcookie("password", "");
    //echo "Cookie not set";
}
//$_SESSION["name"] = $_POST["name"];
echo "<b>Logged in as <b>" . $_SESSION["name"];
// if (isset($_SESSION["name"])) {
//     echo "welcome" . $_SESSION["name"];
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Account</h2>
</body>

</html>
<?php

echo "<a href='viewProfile.php'>Profile</a><br>";
echo "<a href='changePassword.php'>Change Password</a><br>";
echo "<a href='changeProfilePicture.php'>Change Profile Picture</a><br>";
echo "<a href='editProfile.php'>Edit Profile</a><br>";
echo "<a href='logout.php'>Logout</a><br>";
include 'footer.php';
?>