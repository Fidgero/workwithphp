<?php
$db_host = "localhost";
$db_login = "root";
$db_password = "";
$db_name = "users";

$connection = mysqli_connect($db_host,$db_login,$db_password,$db_name);
$sql = "SELECT * FROM users;";

$result = mysqli_query($connection,$sql);
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        echo $row["username"];
        echo '<br>';
    }
}
else
{
    echo 'Строк в таблице не найдено!'; 

}
?>
