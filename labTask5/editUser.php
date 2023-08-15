<?php
require_once 'userInfo.php';

$user = fetchUser($_GET['id']);
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function validateForm() {
            var name = document.forms["registrationForm"]["name"].value;
            var email = document.forms["registrationForm"]["email"].value;
            var password = document.forms["registrationForm"]["password"].value;
            var gender = document.forms["registrationForm"]["gender"].value;
            var bloodGroup = document.forms["registrationForm"]["bloodGroup"].value;
            var phone =
                document.forms["registrationForm"]["phone"].value;
            var address = document.forms["registrationForm"]["address"].value;

            var nameErr = "";
            var emailErr = "";
            var passwordErr = "";
            var genderErr = "";
            var bloodGroupErr = "";
            var phoneNumberErr = "";
            var addressErr = "";

            if (name === "") {
                nameErr = "Name must be filled out";
            }

            if (email === "") {
                emailErr = "Email must be filled out";
            } else {
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    emailErr = "Invalid email format";
                }
            }

            if (password === "") {
                passwordErr = "Password must be filled out";
            } else if (password.length < 8) {
                passwordErr = "Password must be at least 8 characters";
            }

            if (gender === "") {
                genderErr = "Please select a gender";
            }

            if (bloodGroup === "") {
                bloodGroupErr = "Blood group must be selected";
            }

            if (phone === "") {
                phoneNumberErr = "Phone number must be filled out";
            } else {
                var phoneNumberPattern = /^\d{11}$/;
                if (!phoneNumberPattern.test(phone)) {
                    phoneNumberErr = "Invalid phone number format";
                }
            }

            if (address === "") {
                addressErr = "Address must be filled out";
            }

            if (
                nameErr ||
                emailErr ||
                passwordErr ||
                genderErr ||
                bloodGroupErr ||
                phoneNumberErr ||
                addressErr
            ) {
                document.getElementById("nameError").innerHTML = nameErr;
                document.getElementById("emailError").innerHTML = emailErr;
                document.getElementById("passwordError").innerHTML = passwordErr;
                document.getElementById("genderError").innerHTML = genderErr;
                document.getElementById("bloodGroupError").innerHTML = bloodGroupErr;
                document.getElementById("phoneErr").innerHTML =
                    phoneNumberErr;
                document.getElementById("addressErr").innerHTML = addressErr;
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <h2>User Information Form</h2>
    <form action="updateUser.php" name="registrationForm" onsubmit="return validateForm()" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php if (isset($user['Name'])) echo $user['Name'] ?>" />
        <span id="nameError" style="color: red"></span><br /><br />

        <label for="email">Email:</label>
        <input value="<?php if (isset($user['Email'])) echo $user['Email'] ?>" type="email" id="email" name="email" />
        <span id="emailError" style="color: red"></span><br /><br />

        <label for="password">Password:</label>
        <input value="<?php if (isset($user['Password'])) echo $user['Password'] ?>" type="password" id="password" name="password" />
        <span id="passwordError" style="color: red"></span><br /><br />

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" value="<?php if (isset($user['Gender'])) echo $user['Gender'] ?>">
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <span id="genderError" style="color: red"></span><br /><br />

        <label for="bloodGroup">Blood Group:</label>
        <input value="<?php if (isset($user['BloodGroup'])) echo $user['BloodGroup'] ?>" type="text" id="bloodGroup" name="bloodGroup" />
        <span id="bloodGroupError" style="color: red"></span><br /><br />

        <label for="phone">Phone Number:</label>
        <input value="<?php if (isset($user['Phone'])) echo $user['Phone'] ?>" type="text" id="phone" name="phone" />
        <span id="phoneErr" style="color: red"></span><br /><br />

        <label for="address">Address:</label>
        <input value="<?php if (isset($user['Address'])) echo $user['Address'] ?>" type="text" id="address" name="address" />
        <span id="addressErr" style="color: red"></span><br /><br />

        <input type="submit" name="updateUser" value="Update" />
    </form>
</body>

</html>