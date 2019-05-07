<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.05.2019
 * Time: 9:54
 */
$patch = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'translit';

$link = mysqli_connect($patch, $user, $pass, $db_name);
mysqli_set_charset($link, 'utf8') or die('Ошибка соединения с БД');