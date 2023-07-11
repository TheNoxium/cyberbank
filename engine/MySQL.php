<?php
/*
 * Данные для подключения к БД MYSQL
 */
define('DB_Host', '172.20.10.2');
define('DB_User', 'pipa');
define('DB_Password', '12345');
define('DB_Name', 'cyberbank');
/*
 * 1. Получаем данные авторизации
 * 2. Устанавливаем таблицу символов UTF-8
 */
$db = mysqli_connect(DB_Host, DB_User, DB_Password, DB_Name); // 1
mysqli_query($db, "SET NAMES utf8"); // 2

