<?php
if (isset($_POST["submit"]))
{
    include_once('functions.inc.php');
    include_once('db.inc.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (emptyInputsLogin($username,$password) == true)
    {
        header("Location: ../login.php?error=emptyinputslogin");
        exit();
    }
    userLogin($connection,$username,$password);
}
else
{
    header("Location: ../login.php");
    exit();
}
?>