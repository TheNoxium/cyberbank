<?php
/*
 * Включаем буферизацию (не обязательно, но рекомендуем!)
 */
ob_start();
/*Генерируем сессию чтобы браузер запоминал нас
/*
 * Запускаем сессию
 */
session_start();
date_default_timezone_set('Asia/Yekaterinburg');
$today = date("Y-m-d H:i:s");  

/*
* 1. Определяем протокол
* 2. Получаем полный адрес сайта
*/
$protocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https'; // 1
define('URL', ''. $protocol . '://'. $_SERVER['HTTP_HOST'] . ''); // 2


/*
 * Подключаем файл конфигураций базы данных MySQL
 */
require_once('MySQL.php');
/*
 * Подключаем файл функций
 */
require_once('functions.php');
/*
 * Проверка на авторизацию
 */
$user = isset($_SESSION['Login'], $_SESSION['Password']) ? authentication($_SESSION['Login'], $_SESSION['Password']) : 0;





switch ($user && isset($_GET['logout'])) {
    case 'logout':
        unset($_SESSION['Login'], $_SESSION['Password']);
        session_destroy();
        header('Location: ' . URL); // Место, куда нас перекинет после выхода
        break; // После, прекращаем выполнение кода.
}