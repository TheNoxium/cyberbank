<?php
 


$user_Login = htmlspecialchars($user['Login']);

 
// Записываем логин в трасфер

if (mysqli_query($db, "INSERT INTO $user_Login SET transfhistory = '$user_Login' ")) {
   
   echo 'Операция выполнена успешно!';
   
   header('Refresh: 5, url=../');
   exit;





} else {
   header('Refresh: 10');

   echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
}

 
$db->close();
?>