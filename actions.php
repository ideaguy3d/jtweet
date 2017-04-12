<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/10/2017
 * Time: 8:09 AM
 */

include ("functions.php");


if($_GET['action'] == 'loginSignup'){
    $error = "";
    $email = $_POST['email'];
    if(!$email) {
        $error = 'an email address is required.';
    } else if(!$_POST['password']) {
        $error = 'a password is required.';
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error = 'Please use a valid email';
    }

    if ($error != "") {
        echo $error;
        exit();
    }

    if($_POST['loginActive'] == '0') {
        $query = "select * from users where email = '".mysqli_real_escape_string($link, $email)."' limit 1";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0) {
            $error = 'That email is taken!!!!!!';
        } else { // the user hasn't registered yet
            $jsecureEmail = mysqli_real_escape_string($link, $email);
            $jsecurePassword = mysqli_real_escape_string($link, $_POST['password']);
            $query = "insert into users (email, password) values ('"
                .$jsecureEmail."', '"
                .$jsecurePassword."')";
            if (mysqli_query($link, $query)) {
                $insertLink = mysqli_insert_id($link);
                $hashedPassword = md5(md5(mysqli_insert_id($link)).$_POST['password']);
                $query = "update users set password = $hashedPassword where id = $insertLink limit 1";
                mysqli_query($link, $query);
                echo 'user was added to the database ^_^';
            } else {
                $error = 'could not create user';
            }
        }
    } else if($_POST['loginActive'] == '1') {
        echo "Logging zUser in.";
    }

    if ($error != "") {
        echo $error;
        exit();
    }
}
