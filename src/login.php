<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo
'<form action="content1.php" method="POST">
    <label for="username">Enter Username:</label>
    <input type="text" name="username" />
    <input type="submit" value="Login" />
         
</form>';
if (isset($_GET['name']) && $_GET['name'] == 'logout') {
    session_start();
    //This code ends a session:
    $_SESSION = array(); //this variable holds information about a session similar to $_GET
    session_destroy(); //The session ID that was assigned to the cookie is no longer valid
    die();
}
?>