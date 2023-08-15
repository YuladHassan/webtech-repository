<?php

require_once 'model.php';

if (isset($_POST['findUser'])) {

    echo $_POST['name'];

    try {

        $allSearchedUsers = searchUser($_POST['name']);
        require_once 'showSearchedUser.php';
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
