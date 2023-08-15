<?php
require_once 'model.php';
if (isset($_POST['UpdateUser'])) {
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];
    $data['gender'] = $_POST['gender'];
    $data['bloodGroup'] = $_POST['bloodGroup'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];

    if (updateUser($_POST['id'], $data)) {
        echo 'Successfullu Updated!!';
        header('Location: showUser.php?id=' . $_POST["id"]);
    } else {
        echo 'Yor Are Not Allowed to Access this Page ..........';
    }
}
