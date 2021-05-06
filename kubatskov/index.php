<?php
session_start();

if (isset($_SESSION["id"]))
{
    echo 'Welcome, ' . $_SESSION["username"] . '!';
    echo '<a href="profile.php">Profile</a> ';
    echo '<a href="includes/logout.inc.php">Logout</a>';
}
else
{
    echo '<a href="register.php">Sign Up</a> ';
    echo '<a href="login.php">Login</a>';
}
?>