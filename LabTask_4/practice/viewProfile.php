<?php
session_start();
include 'header2.php';
?>
<!DOCTYPE html>

<html>

<head>
    <title></title>

    <style type="text/css">
        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <img src="" alt="">
    <div>
        <div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>User name</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                </tr>
                <?php
                //  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = file_get_contents("data.json");
                $data = json_decode($data, true);
                // $name = $_POST["name"];
                if (isset($data)) {
                    foreach ($data as $row) {
                        if ($row['name'] == $_SESSION["name"]) {
                            echo '<tr>
                                         <td>' . $row["name"] . '</td>
                                         <td>' . $row["e-mail"] . '</td>
                                         <td>' . $row["username"] . '</td>
                                         <td>' . $row["gender"] . '</td>
                                         <td>' . $row["dob"] . '</td>
                                         </tr>';
                        }
                    }
                }
                //}
                ?>
            </table>
            <br>
            <a href="editProfile.php">Edit Profile</a>
            <br>
            <a href="logout">Logout</a>
            <br>
            <a href="changePassword.php">Change Password</a>
            <br>
            <a href="changeProfilePicture.php"> UploadProfile</a>
            <br>
        </div>
    </div>
</body>

</html>
<?php
include 'footer.php';
?>