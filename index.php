<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 07.05.2019
 * Time: 14:24
 */
include_once ('bd.php');

//if ($link) echo "Успех с бд";

$query = "SELECT * FROM slovo";
$result = mysqli_query($link, $query);
for ($data = []; $data[] = mysqli_fetch_assoc($result););

include_once ("index.html");