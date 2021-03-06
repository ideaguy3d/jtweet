<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/10/2017
 * Time: 8:09 AM
 */

include("functions.php");

$error = "";
$realSessionId = mysqli_real_escape_string($link, $_SESSION['id']);

// ACTION = 'loginSignup'
if ($_GET['action'] == 'loginSignup') {
    $email = $_POST['email'];

    // quick validation
    if (!$email) {
        $error = 'an email address is required.';
    } else if (!$_POST['password']) {
        $error = 'a password is required.';
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error = 'Please use a valid email';
    }
    // check for errors
    if ($error != "") {
        echo $error;
        exit();
    }
    if ($_POST['loginActive'] == '0') {
        // 0 means user is signing up.
        $query = "select * from users where email = '" . mysqli_real_escape_string($link, $email) . "' limit 1";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            $error = 'That email is taken.';
        } else {
            // the user hasn't registered yet
            $jsecureEmail = mysqli_real_escape_string($link, $email);
            $jsecurePassword = mysqli_real_escape_string($link, $_POST['password']);
            $query = "insert into users (email, password) values ('"
                . $jsecureEmail . "', '" . $jsecurePassword . "')";
            if (mysqli_query($link, $query)) {
                $_SESSION['id'] = mysqli_insert_id($link);
                $hashedPassword = md5(md5($_SESSION['id']) . $_POST['password']);

                // now hash the password
                $insertLink = mysqli_insert_id($link);
                $query = "update users set password = '" . $hashedPassword
                    . "' where id = '" . $insertLink . "' limit 1";
                mysqli_query($link, $query);
                // user was added to the database & password was supposed to be hashed.
                echo '1';
            } else {
                $error = 'could not create user';
            }
        }
    } else if ($_POST['loginActive'] == '1') {
        // '1' means user is Logging in.
        $realEmail = mysqli_real_escape_string($link, $email);
        $query = "select * from users where email = '" . $realEmail . "' limit 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] == md5(md5($row['id']) . $_POST['password'])) {
            // user successfully logged in
            echo '1';
            $_SESSION['id'] = $row['id'];
        } else {
            $error = 'Could Not find that username/password';
        }
    }

    if ($error != "") {
        echo $error;
        exit();
    }
}

// ACTION = 'toggleFollow'
if ($_GET['action'] == 'toggleFollow') {
    $query = "select * from isFollowing where follower = "
        . mysqli_real_escape_string($link, $realSessionId) . " and isFollowing = "
        . mysqli_real_escape_string($link, $_POST['userId']) . " limit 1";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        // Then we are following
        $row = mysqli_fetch_assoc($result);
        mysqli_query($link, "delete from isFollowing where id = " . mysqli_real_escape_string($link, $row['id']) . " limit 1");
        echo '1'; // user Un-followed
    } else {
        $realPostUser = mysqli_real_escape_string($link, $_POST['userId']);
        $query = "insert into isFollowing (follower, isFollowing) values(" . $realSessionId . ", " . $realPostUser . ")";
        mysqli_query($link, $query);
        echo '2'; // user followed
    }
}

if ($_GET['action'] = 'postTweet') {
    $tweetContent = isset($_POST['tweetContent']) ? $_POST['tweetContent'] : '';
    $realTweetContent = mysqli_real_escape_string($link, $tweetContent);
    if (!$tweetContent) {
        echo "your jtweet is empty !!";
    } else if (strlen($tweetContent) > 140) {
        echo "your jtweet is too long !!";
    } else {
        $jtweetQuery = "insert into tweets (tweet, userid, datetime) values ('" . $realTweetContent . "', '" . $realSessionId . "', NOW())";
        mysqli_query($link, $jtweetQuery);
        echo "ja_tweetSuccessfullyAdded";
    }
}