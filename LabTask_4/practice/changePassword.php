<?php
//require 'header.php';
session_start();
include 'header2.php';
//echo "Change Password";
//require 'footer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<style>
    .error {
        color: #FF0000;
    }
</style>

<body>
    <?php

    // $password = $newpassword = $reEnterPassword= "";
    // $newpasswordErr= $passwordErr=$reEnterPasswordErr= "";
    // $pass = "";
    // $data = file_get_contents("data.json");
    // $data = json_decode($data, true);
    // // $name = $_POST["name"];
    // if (isset($data)) {
    //     foreach ($data as $row) {
    //         if ($row['name'] == $_SESSION["name"]) {
    //             $pass= $row['password'];
    //         }
    //     }
    // }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST["password"])) {
            $passwordErr = "Current password is required";
        } else {
            $password = test_input($_POST["password"]);
            if ($password != $pass) {
                $passwordErr = "Incorrect Password";
            }
        }



        if (empty($_POST["newpassword"])) {
            $newpasswordErr = "New Password is required";
        } else {
            if ($newpassword == $pass) {
                $newpasswordErr = "New password should be different from the current password";
            }
            $newpassword = test_input($_POST["newpassword"]);
            $number = preg_match('@[0-9]@', $newpassword);
            $uppercase = preg_match('@[A-Z]@', $newpassword);
            $lowercase = preg_match('@[a-z]@', $newpassword);
            $specialChars = preg_match('@[^\w]@', $newpassword);

            if (strlen($newpassword) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                $newpasswordErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            }
        }
        if (empty($_POST["reEnterPassword"])) {
            $reEnterPasswordErr = "Re enter the new password";
        } else {
            $reEnterPassword = test_input($_POST["reEnterPassword"]);
            if ($reEnterPassword != $newpassword) {
                $reEnterPasswordErr = "Passwrod not matched";
            }
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Change Password</h2>
    <p><span class=error>* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        Current Password: <input type="text" name="password">
        <span class="error">* <?php echo $passwordErr; ?></span>
        <br><br>
        New Password: <input type="text" name="newpassword">
        <span class="error">* <?php echo $newpasswordErr; ?></span>
        <br><br>
        Re Type Password: <input type="text" name="reEnterPassword">
        <span class="error">* <?php echo $reEnterPassword; ?></span>
        <br><br>

        <br><br>
        <input type="submit" name="submit" value="Submit">

    </form>

</body>

</html>
<?php
include 'footer.php';
?>