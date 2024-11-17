<?php
include('db.php');
error_reporting(0);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from users where username='" . $username . "' AND password='" . $password . "'";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if ($row['usertype'] == "student") {
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = "student";

        header("location:studentHome.php");
    } else if ($row['usertype'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = "admin";

        header("location:adminHome.php");
    } else {
        $message = "Invalid username or password!";

        $_SESSION['loginMessage'] = $message;

        header("location: login.php");
    }
}
?>