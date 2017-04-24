<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/23/2017
 * Time: 11:46 PM
 */

?>

<div class="container-fluid">
    <div class="row">
        <!-- Left Side -->
        <div class="col-8">

            <?php if (isset($_GET['userid'])) { ?>
                <h6>jTweets from</h6>
                <?php displayTweets($_GET['userid']); ?>
            <?php } else { ?>
                <h4>Active Users:</h4>
                <?php displayUsers(); ?>
            <?php } ?>

        </div>

        <!-- Right Side -->
        <div class="col-4">
            <br>
            <!-- These will turn into an angular data-binding that make a request to the php backend. -->
            <?php displaySearch(); ?>
            <hr>
            <?php displayTweetBox(); ?>
        </div>
    </div>
</div>
