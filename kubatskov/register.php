<!DOCTYPE html>
<html>
    <head>
    <title>Sign up</title>
    <meta charset="utf-8">
    </head>
    <body>
            <form action="includes/register.inc.php" method="POST">
                <input name="firstname" placeholder="Enter firstname" type="text">
                <input name="lastname" placeholder="Enter lastname" type="text">
                <input name="username" placeholder="Enter username" type="text">
                <input name="password" placeholder="Enter password" type="password">
                <input name="repeat_password" placeholder="Repeat Password" type="password">
                <button name="submit" type="submit">Sign up!</button>
            </form>

            <?php
                if(isset($_GET["registration"]))
                {
                    if ($_GET["registration"] == "success")
                    {
                        echo 'Success!!';

                    }
                }
                if(isset($_GET["error"]))
                {
                    if ($_GET["error"] == "passwordsmismatch")
                    {
                        echo 'Пароли не совпадают!!!';

                    }
                    else if ($_GET["error"] == "stmt")
                    {
                        echo 'Трабла в STMT';
                    }
                    else if ($_GET["error"] == "emptyinputs")
                    {
                        echo 'Заполните все поля!!!';
                    }
                    else if ($_GET["error"] == "logintaken")
                    {
                        echo 'Логин уже используется';
                    }
                    else if ($_GET["error"] == "incorrectlogin")
                    {
                        echo 'Логин должен содержать только буквы и цифры!';
                    }
                }

            ?>
    </body>
</html>
