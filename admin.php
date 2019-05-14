
<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.05.2019
 * Time: 13:31
 */
session_start();
$hid = "";
if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
    $hid = "hidden";
    echo "<p><a href='logout.php'>Выход</a></p>";
    include_once('bd.php');

    if (isset($_POST['edit']) && !empty($_POST['eng']) && !empty($_POST['eng'])) {
        $id = (int) $_POST['id'];
        $eng = mysqli_real_escape_string($link, trim($_POST['eng']));
        $rus = mysqli_real_escape_string($link, trim($_POST['rus']));
        $trans = mysqli_real_escape_string($link, trim($_POST['trans']));
        $t = "UPDATE slovo SET eng='%s', rus='%s', trans='%s' WHERE id=%d";
        $query = sprintf($t, $eng, $rus, $trans, $id);
        $result = mysqli_query($link, $query) or die ("Ошибка базы данных");
        if (mysqli_affected_rows($link) == 1) {
            echo "Слово обновлено";
        }
    }

    if (isset($_POST['delete'])) {
        $id = (int) $_POST['id'];
        $query = sprintf("DELETE FROM slovo WHERE id=%d", $id);
        mysqli_query($link, $query) or die ("Ошибка базы данных");
        if (mysqli_affected_rows($link) == 1) {
            echo "Слово удалено";
        }
    }

    $query = "SELECT * FROM slovo";
    $result = mysqli_query($link, $query) or die ("Ошибка базы данных");
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    ?>
    <p><a href="index.php" <?=$hid; ?>>Вернуться на главную страницу</a></p>
    <?php
    include_once("views/index_admin.html");
}

if (isset($_POST["pass"]) && !empty($_POST["pass"]) && $_POST["pass"] === '555') {
    //session_start();
    $_SESSION['auth'] = true;
    $_POST["pass"] = "";

    $hid = "hidden";
    echo "<p><a href='logout.php'>Выход</a></p>";
    include_once('bd.php');
    $query = "SELECT * FROM slovo";
    $result = mysqli_query($link, $query) or die ("Ошибка базы данных");
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    ?>
    <p><a href="index.php" <?=$hid; ?>>Вернуться на главную страницу</a></p>
    <?php
    include_once("views/index_admin.html");
    }
?>


<form action="admin.php" method="POST" <?=$hid; ?>>
    <p>Введите пароль: <input type="password" value="" name="pass"></p>
    <input type="submit">
</form>
