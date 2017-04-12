<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/5/2017
 * Time: 12:03 AM
 */

$link = mysqli_connect("localhost", "root", "", "jtweet");

if(mysqli_connect_errno()) {
    print_r(mysqli_connect_error());
    exit();
}