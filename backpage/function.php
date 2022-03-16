<?php
require_once('include/config.php');

// This is for sanitizing our inputs...
function sanitize($input) {
    $input = htmlentities(htmlspecialchars(strip_tags(trim($input))));
    return $input;
}

// This is a function for blocking url hackers
function blockUrlHackers($url) {
    if (!isset($_SESSION['admin_id'])) {
        header("Location: $url");
    }
}

// This function is for resisting unauthenticated users
function authenticate($url) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: $url");
        exit();
    }
}

function defaultTime(){
    date_default_timezone_set("Africa/Lagos");
    echo "The time is " . date("d/m/Y h:i:sa");
}

function isLoggedIn(){
    if (isset($_SESSION['email'])){
        return true;
    }else{
        return false;
    }
}

function isAdmin(){
    if (isset($_SESSION['email']) && $_SESSION['user']['user_type'] == 'admin' ){
        return true;
    }else{
        return false;
    }
}

function total_amount_withdrawn(){
    $total_withdrawn = "SELECT sum(wamount) AS withdrawTotal FROM `withdraw` WHERE `user_email`='$sessEmail' AND `wstatus`='Pending'";
        $total_withdrawn_query = $dbc->query($total_withdrawn);
        $total_withdrawn_display = mysqli_fetch_assoc($total_withdrawn_query);

       if($total_withdrawn_display){
        $sum_of_rows = $total_withdrawn_display['withdrawTotal']; 
      }
      if($sum_of_rows!==null){echo $sum_of_rows;}else{echo "0.00";}
}