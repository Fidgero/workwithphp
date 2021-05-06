<html>
<head>
</head>
<body>
<form action="includes/login.inc.php" method="POST">
<input name="username" placeholder="Enter username" type="text">
<input name="password" placeholder="Enter password" type="password">
<button name="submit" type="submit">Login</button>
</form>
<?php
if (isset($_GET['error']))
{
    if ($_GET['error'] == "emptyinputslogin")
    {
        echo '<p>Заполните пустые поля!</p>';
    }
}

?>
</body>
</html>