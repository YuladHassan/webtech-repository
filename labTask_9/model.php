<?php
include 'connection.php';

// if (dbConnect()) {
//     echo "true";
// }
function addUser($data)
{
    $conn = dbConnect();
    $query = "INSERT INTO `user_info`(`Name`, `Email`, `Password`, `Gender`, `BloodGroup`, `Phone`, `Address`) VALUES (:name,:email, :password, :gender,:bloodGroup,:phone,:address)";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':gender' => $data['gender'],
            ':bloodGroup' => $data['bloodGroup'],
            ':phone' => $data['phone'],
            ':address' => $data['address']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function showAllUsers()
{
    $conn = dbConnect();
    $query = "SELECT * FROM `user_info`;";
    try {
        $stmt = $conn->query($query);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function ShowUser($id)
{
    $conn = dbConnect();
    $query = "SELECT * FROM `user_info` WHERE ID=?;";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function updateUser($id, $data)
{
    $conn = dbConnect();
    $query = "UPDATE `user_info` SET Name= ?, Email= ?, Password= ? , Gender= ?, BloodGroup= ?,Phone= ?, Address = ? WHERE  ID =?";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([$data['name'], $data['email'], $data['[password'], $data['gender'], $data['bloodGroup'], $data['phone'], $data['address'], $id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function searchUser($name)
{
    $conn = dbConnect();
    $query = "SELECT * FROM `user_info` WHERE Name LIKE '%$name%';";
    try {
        $stmt = $conn->query($query);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function ajUser()
{
    $conn = dbConnect();
    $query = "SELECT Name FROM `user_info`;";
    try {
        $stmt = $conn->query($query);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $names = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $names;
}
function checkEmailExists($email)
{
    $conn = dbConnect();


    try {
        $query = "SELECT COUNT(*) FROM user_info WHERE Email = '$email';";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        return $count > 0;
    } catch (PDOException $e) {
        // Handle any database errors here
        return false;
    }
}
