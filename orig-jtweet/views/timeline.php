<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/20/2017
 * Time: 8:26 PM
 */

?>

<div class="container-fluid">
    <div class="row">
        <!------------------------------------------------>
        <!------------------ Left Side ------------------>
        <!------------------------------------------------>
        <div class="col-8">
            <h1>Tweets For You!</h1>
            <!-- This will turn into an angular data-binding that makes a request to the php backend. -->
            <?php displayTweets('isFollowing'); ?>

            <?php include("./linq1-prac1.html"); ?>
        </div>

        <!------------------------------------------------>
        <!------------------ Right Side ------------------>
        <!------------------------------------------------>
        <div class="col-4">
            <br>
            <!-- These will turn into an angular data-binding that make a request to the php backend. -->
            <?php displaySearch(); ?> <hr>
            <?php displayTweetBox(); ?>
        </div>
    </div>
</div>