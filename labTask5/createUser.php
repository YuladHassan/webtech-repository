<?php
echo "regirstration form";

require_once 'model.php';

if (isset($_POST['createUser'])) {
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];
    $data['gender'] = $_POST['gender'];
    $data['bloodGroup'] = $_POST['bloodGroup'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];


    if (addUser($data)) {
        echo 'Successfully added!!';
    }
} else {
    echo "You are not allowed to access this page";
}
