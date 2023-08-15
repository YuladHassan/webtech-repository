<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
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
    <h2>Registration Form</h2>
    <form action="createUser.php" name="registrationForm" onsubmit="return validateForm()" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" />
        <span id="nameError" style="color: red"></span><br /><br />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" />
        <span id="emailError" style="color: red"></span><br /><br />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" />
        <span id="passwordError" style="color: red"></span><br /><br />

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <span id="genderError" style="color: red"></span><br /><br />

        <label for="bloodGroup">Blood Group:</label>
        <input type="text" id="bloodGroup" name="bloodGroup" />
        <span id="bloodGroupError" style="color: red"></span><br /><br />

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" />
        <span id="phoneErr" style="color: red"></span><br /><br />

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" />
        <span id="addressErr" style="color: red"></span><br /><br />

        <input type="submit" name="createUser" value="Register" />
    </form>
</body>

</html>