<?php
function emptyInputs($username,$password,$repeat_password)
{
    $result;
    if (empty($username) || empty($password) || empty($repeat_password))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
return $result;
}

function passwordsMismatch($password,$repeat_password)
{
    $result;
    if ($password != $repeat_password)
    {
        $result = true;

    }
    else
    {
        $result = false;
    }
return $result;
}

function incorrectLogin($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    echo $result;
return $result;
}

function createUser($connection,$username,$password,$firstname,$lastname)
{
    $sql = "INSERT INTO users (username,password,firstname,lastname) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../register.php?error=stmt");
        exit();
    }
    $pwdhashed = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$username,$pwdhashed,$firstname,$lastname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../register.php?registration=success");
}

function loginTaken($connection,$username)
{
    $result;
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../register.php?error=stmt");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $query_get = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($query_get))
    {
        return $row; 
    }
    else
    {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function userLogin($connection,$username,$password)
{
    $userExists = loginTaken($connection,$username);
    if ($userExists == false)
    {
            header("Location: ../login.php?error=wronglogin");
            exit();
    }
    $hashedpwd = $userExists["password"];
    $checkpwd = password_verify($password,$hashedpwd);
    if($checkpwd == false)
    {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkpwd == true)
    {
        session_start();
        $_SESSION['id'] = $userExists['id'];
        $_SESSION['username'] = $userExists['username'];
        $_SESSION['profileimage'] = $userExists['profileimage'];
        $_SESSION['firstname'] = $userExists['firstname'];
        $_SESSION['lastname'] = $userExists['lastname'];
        header("Location: ../index.php");
        exit();
    }
}

function emptyInputsLogin($username,$password)
{
    $result;
    if (empty($username) || empty($password))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
return $result;
}
function profileEdit($username,$uploadedfile,$connection,$firstname,$lastname,$username1)
{
    $sql = "UPDATE users SET profileimage = ? WHERE username = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../profile.php?error=stmt");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$uploadedfile,$username);
    mysqli_stmt_execute($stmt);
    $query_get = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../profile.php");
 
    $sql1 = "UPDATE users SET firstname = ?, lastname = ?, username = ? WHERE username = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql1))
    {
        header("Location: ../profile.php?error=stmt");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$firstname,$lastname,$username1,$username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>
