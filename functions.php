<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/5/2017
 * Time: 12:03 AM
 */

session_start();

$link = mysqli_connect("localhost", "root", "", "jtweet");

if (mysqli_connect_errno()) {
    print_r(mysqli_connect_error());
    exit();
}
if (isset($_GET['function'])) {
    if ($_GET['function'] == 'logout') {
        session_unset();
    }
}

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365, 'year'),
        array(60 * 60 * 24 * 30, 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24, 'day'),
        array(60 * 60, 'hour'),
        array(60, 'min'),
        array(1, 's')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }
    $print = ($count == 1) ? '1 ' . $name : "$count {$name}s";
    return $print;
}

function displayTweets($type) {
    global $link;
    $sessionCheck = isset($_SESSION['id']) ? $_SESSION['id'] : '987654321';
    $realSession = mysqli_real_escape_string($link, $sessionCheck);
    
    if ($type == 'public') {
        $whereClause = '';
    }
    else if ($type == 'isFollowing') {
        $query = "select * from isfollowing where follower =" . mysqli_real_escape_string($link, $_SESSION['id']);
        $result = mysqli_query($link, $query);

        $whereClause = "";
        while ($row = mysqli_fetch_assoc($result)) {
            if ($whereClause == "") {
                $whereClause = "where";
            } else {
                $whereClause .= " or";
            }
            $whereClause .= " userid = " . $row['isFollowing'];
        }
    }
    else if ($type == 'yourtweets') {
        $whereClause = "where userid = ".$realSession;
    }

    $query = "select * from tweets " . $whereClause . " order by datetime desc limit 10";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 0) {
        echo '<br>there are no tweets to display';
    } else {
        $row = mysqli_fetch_assoc($result);
        while ($row) {
            $userQuery = "select * from users where id = " . mysqli_real_escape_string($link, $row['userid']) . " limit 1";
            $userQueryResult = mysqli_query($link, $userQuery);
            $user = mysqli_fetch_assoc($userQueryResult);
            $userIdHolder = isset($row['id']) ? $row['id'] : '';

            #region The html output being echoed on multiple lines
            echo '<p><strong>' . $row ['tweet'];
            echo '</strong> <small>~' . $user['email'] . ', ' . time_since(time() - strtotime($row['datetime'])) . ' ago.</small>
                <a class="btn btn-sm btn-info toggleFollow" data-userid="' . $userIdHolder . '">';

            $isFollowingQuery = "select * from isFollowing where follower = ".$realSession
                ." and isFollowing = ".mysqli_real_escape_string($link, $row['userid'])." limit 1";

            $isFollowingQueryResult = mysqli_query($link, $isFollowingQuery);

            if(mysqli_num_rows($isFollowingQueryResult) > 0) {
                echo "Unfollow";
            } else {
                echo "Follow";
            }
            echo '</a></p>';
            #endregion


            $row = mysqli_fetch_assoc($result);
        }
    }
}

function displaySearch() {
    echo '
        <div class="form-inline">
          <div class="form-group mx-sm-3">
            <label for="tweetSearch" class="sr-only">Search for tweets</label>
            <input type="text" class="form-control" id="tweetSearch" placeholder="Search for tweets">
          </div>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
    ';
}

function displayTweetBox() {
    if (isset($_SESSION['id'])) {
        if ($_SESSION['id'] > 0) {
            echo '
            <div id="tweetSuccess" class="alert alert-success">jTweet successfully posted!</div>
            <div id="tweetFail" class="alert alert-danger">jTweet Failed to post...</div>
            <div class="form">
              <div class="form-group mx-sm-3">
                <textarea id="tweetContent" class="form-control" placeholder="Write your tweet!"></textarea>
                <br>
                <button id="postTweetButton" class="btn btn-warning">Post</button>
              </div>
            </div>
        ';
        }
    }
}

//