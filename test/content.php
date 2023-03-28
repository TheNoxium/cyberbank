<?php
 


$user_Login = htmlspecialchars($user['Login']);

if (mysqli_query($db, "INSERT INTO $user_Login (reg_date) VALUES (NOW())")) {


    echo 'Операция выполнена успешно!';






} else {


    echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
}
?>