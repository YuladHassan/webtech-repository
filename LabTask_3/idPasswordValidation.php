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
    $name = $password = "";
    $nameErr = $passwordErr= "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]{2,}$/", $name)) {
                $nameErr = "At least two characers required";
            }
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            $number = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
 
             if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                $passwordErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
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

    <h2>PHP Form Validation Example</h2>
    <p><span class=error>* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        User ID: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Password: <input type="text" name="password">
        <span class="error">* <?php echo $passwordErr; ?></span>
        <br><br>
    

        <br><br>
        <input type="submit" name="submit" value="Submit">

    </form>

</body>

</html>
 