<?php
if (isset($_POST["submit"]))
{
    include_once('functions.inc.php');
    include_once('db.inc.php'); 

    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    if (emptyInputs($username,$password,$repeat_password) == true)
    {
        header("Location: ../register.php?error=emptyinputs");
        exit();
    }
    else if (incorrectLogin($username) == true)
    {
        header("Location: ../register.php?error=incorrectlogin");
        exit();
    }
    else if (passwordsMismatch($password,$repeat_password) == true)
    {
        header("Location: ../register.php?error=passwordsmismatch");
        exit();
    }
    else if(loginTaken($connection,$username) != false)
    {
        header("Location: ../register.php?error=logintaken");
        exit();
    }
    createUser($connection,$username,$password,$firstname,$lastname);
   
}
else
{
    header("Location: ../register.php");
    exit();
}
?>