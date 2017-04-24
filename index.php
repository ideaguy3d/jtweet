<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/2/2017
 * Time: 6:53 PM
 */

include("functions.php");

include("views/header.php");

$page = isset($_GET['page']) ? $_GET['page'] : '';

// timeline page
if ($page == 'timeline') {
    include("views/timeline.php");
}
// yourtweets page
else if ($page == 'yourtweets') {
    include("views/yourtweets.php");
}
// home page
else if ($page == 'home') {
    include ("views/home.php");
}
// search page
else if ($page == 'search') {
    include ("views/search.php");
}
// public profile page
else if ($page == 'publicprofiles') {
    include ("views/public.profile.php");
}
// default page
else {
    include("views/home.php");
}

include("views/footer.php");

//