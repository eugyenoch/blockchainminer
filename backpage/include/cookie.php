<?php
//PHP COOKIES
//Set a cookie - all cookies are set for 30days
    if(isset($_POST['checkbox'])){
    setcookie("email",$_POST['user'],time()+(86400*30));
    setcookie("pwd",$_POST['pwd'],time()+(86400*30));
    }
?>