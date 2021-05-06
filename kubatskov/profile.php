<?php
session_start();
if (isset($_SESSION["id"]))
{
    //echo'Hello, ' . $_SESSION["username"] .'!';
    echo'Hello, ' . $_SESSION["firstname"] . ' ' . $_SESSION["lastname"] . '!';
    echo '<img src="' . $_SESSION["profileimage"] . '" alt="avatar">';
    echo '<br>';
    echo '<br>';
    echo 'Here you can edit your profile!';
    echo '<form action="includes/profile.inc.php" method="POST" enctype="multipart/form-data">';
    echo '<input type="text" name="username" placeholder="username">';
    echo '<br>';
    echo '<input type="text" name="firstname" placeholder="firstname">';
    echo '<br>';
    echo '<input type="text" name="lastname" placeholder="lastname">';
    echo '<br>';
    echo '<input type="file" name="profileimage" accept="image/*">';
    echo '<br>';
    echo '<button type="submit" name="edit">Edit</button>';
    echo '</form>';
}

?>