<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); //this starts a session if there is not a prior session. Otherwise, it will continue the prior session

if(session_status() == PHP_SESSION_ACTIVE) {
    if(isset($_POST['username'])) {
        $_SESSION['username'] = $_POST['username'];
    }
    else {
       // This redirects the user after you've destroyed a session:
            $filePath = explode('/', $_SERVER['PHP_SELF'], -1); //The -1 keeps everything except the last element (the filename)
            $filePath = implode('/', $filePath); //This gives the path up to the filename
            $redirect = "http://" .  $_SERVER['HTTP_HOST'] . $filePath; //gives the redirect path
            header("Location: {$redirect}/login.php", true); //this lets the browser know that 
                                                               //when it receives the header, it must go somewhere else
                                                               //the 'true' lets it know it can replace the existing header
    }
    
    if(!isset($_SESSION['visits'])){
        $_SESSION['visits'] = -1;
    }
    
    if ($_POST['username'] == '' || $_POST['username'] == NULL) {
        echo 'A username must be entered. Click <a href="login.php">here</a> to return to the login screen.<br>';
        return 0;
    }
    
    $_SESSION['visits']++;
    echo "Hello $_SESSION[username], you have visited this page $_SESSION[visits] times before.<br>";
}
?>
        <form action="login.php?name=logout" method="POST">
             Click <input type="submit" value="here" /> to logout.
        </form>
<p>Click <a href="content2.php">here</a> to go to content2.php

