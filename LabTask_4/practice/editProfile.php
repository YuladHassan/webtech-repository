<?php
session_start();
include 'header2.php';
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
    $name  = $email = $username = $dob = $gender = "";
    $nameErr = $usernameErr = $dobErr = $genderErr = $emailErr  = "";
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

        $data = file_get_contents("data.json");
        $data = json_decode($data, true);
        // $name = $_POST["name"];
        if (isset($data)) {
            foreach ($data as $row) {
                if ($row['name'] == $_SESSION["name"]) {
                    $user = array("name" => $row['name'], "e-mail" => $row['email'], "username" => $row['username'], "password" => $row['password'], "gender" => $row['gender'], "dob" => $row['dob']);
                    // $user["name"] = $row["name"];
                }
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

    <h2>Edit Profile</h2>
    <p><span class=error>* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $user["name"]; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Email: <input type="text" name="email" value="">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        User Name:<input type="text" name="username" value="">
        <span class="error">* <?php echo $usernameErr; ?></span>
        <br><br>
        Date of Birth:
        <input type="date" min="1990-01-01" max="2005-01-01" id="dob" name="dob" value="">
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