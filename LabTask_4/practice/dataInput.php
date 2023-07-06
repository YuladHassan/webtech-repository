<?php
session_start();
include 'header.php';
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
    $name = $password = $email = $username = $dob = $gender = $confirmpassword = "";
    $nameErr = $passwordErr = $usernameErr = $dobErr = $genderErr = $emailErr = $confirmpasswordErr = "";
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

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["username"])) {
            $usernameErr = "User name is required";
        } else {
            $username = test_input($_POST["username"]);
            if (!preg_match("/^[a-zA-Z-' ]{2,}$/", $username)) {
                $usernameErr = "At least five characers required";
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            // if (!preg_match("/^[a-zA-Z-' ]{8,}$/", $password)) {
            //     $passwordErr = "At least eight characers required";
            // }
            if (strlen($_POST["password"]) <= '8') {
                $passwordErr = "Your Password Must Contain At Least 8 Characters!";
            } elseif (!preg_match("#[0-9]+#", $password)) {
                $passwordErr = "Your Password Must Contain At Least 1 Number!";
            } elseif (!preg_match("#[A-Z]+#", $password)) {
                $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
            } elseif (!preg_match("#[a-z]+#", $password)) {
                $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
            }
        }

        if (empty($_POST["confirmpassword"])) {
            $confirmpasswordErr = "Confirm Password is required";
        } else {
            $confirmpassword = test_input($_POST["confirmpassword"]);
            if ($confirmpassword != $password) {
                $confirmpasswordErr = "Password does not match";
            }
        }


        if (empty($_POST["dob"])) {
            $dobErr = "Date of Birth is required";
        } else {
            $dob = test_input($_POST["dob"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (file_exists('data.json')) {
            $current_data = file_get_contents('data.json');
            $array_data = json_decode($current_data, true);
            $new_data = array(
                'name'               =>     $_POST['name'],
                'e-mail'          =>     $_POST["email"],
                'username'     =>     $_POST["username"],
                'password' => $_POST["password"],
                'gender'     =>     $_POST["gender"],
                'dob'     =>     $_POST["dob"]
            );
            $array_data[] = $new_data;
            $final_data = json_encode($array_data);
            if (file_put_contents('data.json', $final_data)) {
                $message = "<label>File Appended Success fully</p>";
            }
        } else {
            $error = 'JSON File not exits';
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

    <h2>Submit the following form with your information</h2>
    <p><span class=error>* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Email: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        User Name:<input type="text" name="username">
        <span class="error">* <?php echo $usernameErr; ?></span>
        <br><br>
        Password:<input type="text" name="password">
        <span class="error">* <?php echo $passwordErr; ?></span>
        <br><br>
        Confirm Password:<input type="text" name="confirmpassword">
        <span class="error">* <?php echo $confirmpasswordErr; ?></span>
        <br><br>
        Date of Birth:
        <input type="date" min="1990-01-01" max="2005-01-01" id="dob" name="dob">
        <span class="error">* <?php echo $dobErr; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Add">

    </form>

    <?php
    include 'footer.php';

    ?>
</body>

</html>