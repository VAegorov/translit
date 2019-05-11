<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.05.2019
 * Time: 14:53
 */
session_start();
$_SESSION = [];
setcookie(session_name(), "", time() - 3600, "/");
session_destroy();
echo "Вы вышли";
?>

<p><a href="index.php">Вернуться на главную страницу</a></p>
