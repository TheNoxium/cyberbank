Ваш логин: <?php echo htmlspecialchars($user['Login']); ?> <a href="edit">[Изменить]</a><br>
Ваш пароль: <?php echo htmlspecialchars($user['Password']); ?> <a href="edit-passwd">[Изменить]</a><br>
Информация о вас: <?php echo htmlspecialchars($user['info']); ?> <a href="edit-info">[Изменить]</a><br>
Ваши права: <?php echo access($user['access']); ?> 

<?php
 


$user_Login = htmlspecialchars($user['Login']);

$sql = "SELECT * FROM $user_Login ORDER BY `auth_date` DESC limit 0,10";
if($result = mysqli_query($db, $sql)){
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    //echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Дата последнего входа</th>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["auth_date"] . "</td>";
            
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($db);
?>
