<?php
$access2 = 0;
/*
 * Функция проверки пользователя
 */
function authentication($Login, $Password)
{
    global $db;
    $query = "SELECT * FROM Accounts WHERE Login = '{$Login}' AND Password = '{$Password}' LIMIT 1";
    return mysqli_fetch_assoc(mysqli_query($db, $query));
}

/*
 * Функция вывода прав пользователю
 */
function access($getAccess)
{
    switch ($getAccess) {
        case 1:
            return '<span style="color: RED; ">Администратор</span>';
        default:
            return '<span style="color: GREEN; ">Пользователь</span>';
    }
}

