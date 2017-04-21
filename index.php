<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/2/2017
 * Time: 6:53 PM
 */

include ("functions.php");

include ("views/header.php");

$page = isset($_GET['page']) ? $_GET['page'] : '';
if($page == 'timeline') {
    include ("views/timeline.php");
} else {
    include ("views/home.php");
}

include ("views/footer.php");

//