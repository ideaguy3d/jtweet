<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/5/2017
 * Time: 12:18 AM
 */

?>

<div class="container-fluid">
    <div class="row">
        <!-- Left Side -->
        <div class="col-8">
            <h1>Recent Tweets.</h1>

            <!-- This will turn into an angular data-binding that makes a request to the php backend. -->
            <?php displayTweets('public'); ?>
        </div>

        <!-- Right Side -->
        <div class="col-4">
            <br>
            <!-- These will turn into an angular data-binding that make a request to the php backend. -->
            <?php displaySearch(); ?> <hr>
            <?php displayTweetBox(); ?>
        </div>
    </div>
</div>


