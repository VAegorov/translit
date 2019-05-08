<p><a href="../index.php">Вернуться на главную страницу</a></p>
<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.05.2019
 * Time: 13:31
 */

$hid = "";
if (isset($_POST["pass"]) && !empty($_POST["pass"]) && $_POST["pass"] === '555') {
    echo session_start();
    $_SESSION['auth'] = true;
    $_POST["pass"] = "";
    $hid = "hidden";
    echo "<p><a href='logout.php'>Выход</a></p>";
    }
?>


<form action="admin.php" method="POST" <?=$hid; ?>>
    <p>Введите пароль: <input type="password" value="" name="pass"></p>
    <input type="submit">
</form>
