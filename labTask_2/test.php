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
    $name = $email = $dob = $gender = $degree = $bloodGroup = "";
    $nameErr = $dobErr = $genderErr = $emailErr = $degreeErr = $bloodGroupErr = "";
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

        if (empty($_POST["degree"])) {
            $degreeErr = "Degree is required";
        } else {
            $degree = test_input($_POST["degree"]);
        }

        if (empty($_POST["bloodGroup"])) {
            $bloodGroupErr = "Blood Group is required";
        } else {
            $bloodGroup = test_input($_POST["bloodGroup"]);
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
        Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Email: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Date of Birth:
        <input type="date" min="1953-01-01" max="1998-01-01" id="dob" name="dob">
        <span class="error">* <?php echo $dobErr; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        Degree:
        <input type="checkbox" id="degree" name="degree" value="SSC">SSC
        <input type="checkbox" id="degree" name="degree" value="HSC">HSC
        <input type="checkbox" id="degree" name="degree" value="BSC">BSC
        <input type="checkbox" id="degree" name="degree" value="MSC">MSC

        <span class="error">* <?php echo $degreeErr; ?></span>
        <br><br>
        Blood Group:
        <input list="bloodGroup" name="bloodGroup">
        <span class=" error">* <?php echo $bloodGroupErr; ?></span>
        <datalist id="bloodGroup">
            <option value="A+">A+</option>
            <option value="B+">B+</option>
            <option value="O+">O+</option>

        </datalist>

        <br><br>
        <input type="submit" name="submit" value="Submit">

    </form>

    <?php

    echo "<h2> Your Input: </h2>";
    echo "$name";
    echo "<br>";
    echo "$email";
    echo "<br>";
    echo "$dob";
    echo "<br>";
    echo "$gender";
    echo "<br>";
    echo "$degree";
    echo "<br>";
    echo "$bloodGroup";
    echo "<br>";
    ?>
</body>

</html>