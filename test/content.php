<?php
 


$user_Login = htmlspecialchars($user['Login']);

 
// создаем столбец после поле description
$sql = "ALTER TABLE $user_Login ADD transfhistory TEXT ";
 
if ($db->query($sql) === TRUE) {
   echo "Столбец успешно создан";
} else {
   echo "Ошибка создание столбца" . $db->error;
}


 
$db->close();
?>