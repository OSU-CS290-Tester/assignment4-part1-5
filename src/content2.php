<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
echo "This is content2.php<br>";
echo "Click <a href='content1.php'>here</a> to return to content1.php";
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
}
?>