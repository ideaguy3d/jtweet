<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/23/2017
 * Time: 11:21 PM
 */

?>

<div class="container-fluid">
    <div class="row">
        <!-- Left Side -->
        <div class="col-8">
            <h1><code>Search Results</code></h1>

            <!-- This will turn into an angular data-binding that makes a request to the php backend. -->
            <?php displayTweets('search'); ?>
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
