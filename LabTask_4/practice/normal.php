<?php
session_start();
include 'header.php';



if (isset($_POST['name']) || isset($_POST['password'])) {
    $data = file_get_contents("data.json");
    $data = json_decode($data, true);
    $_SESSION['name'] = $_POST['name'];

    $username = $_POST['name'];
    $password = $_POST['password'];

    foreach ($data as $user) {
        if ($user["name"] == $username && $user["password"] == $password) {
            echo "Name: " . $user["name"] . "<br>";
            echo "Email: " . $user["e-mail"] . "<br>";
            header("location:welcome.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <br>
        Name:
        <input type="text" name="name" value="<?php if (isset($_COOKIE['name'])) {
                                                    echo $_COOKIE['name'];
                                                } ?>">
        <br>
        Password:
        <input type="password" name="password" value="<?php if (isset($_COOKIE['password'])) {
                                                            echo $_COOKIE['password'];
                                                        } ?>">
        <br>
        <input id="remember" type="checkbox" name="remember" <?php if (isset($_COOKIE['name'])) {
                                                                    echo "checked";
                                                                } ?>> <label for="remember">Remember Me</label>
        <br>
        <br>

        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>
<?php
include 'footer.php';
?>