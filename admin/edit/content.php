<?php
$id = $_GET['id'];

if ($query_2 = mysqli_query($db,"SELECT * FROM `Accounts` WHERE `ID`='" . $id . "'"))
$assoc_2 = mysqli_fetch_assoc($query_2);
{
    if (isset($_POST['editProfile']))
    {
        $Login = mysqli_real_escape_string($db, $_POST['Login']);
        $Password = mysqli_real_escape_string($db, ($_POST['Password']));
        $access = mysqli_real_escape_string($db, $_POST['access']);
        $info = mysqli_real_escape_string($db, $_POST['info']);

        if (mysqli_query($db,"UPDATE Accounts SET Login='$Login',Password='$Password',access='$access',info='$info' WHERE id = '$id';"))
        {
            header("Refresh: 3; ../list");
            echo 'Операция выполнена успешно!';
        }
        else
        {
            header('Refresh: 10');
            echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
        }
    }
}
?>

<div id="nav-link ">

<div class="submitButton3 ">

<div id="edit-bloc">
    <form method="post">

        <label for="login_input">Логин</label>
        <input class="reg_inputs1"   name="Login" type="text" id="login_input" placeholder="Введите логин" value="<?php echo htmlspecialchars($assoc_2['Login']); ?>" required>

        <br><br>

        <label for="password_input">Пароль</label>
        <input class="reg_inputs1"  name="Password" type="text" id="password_input" value="<?php echo htmlspecialchars($assoc_2['Password']); ?>" >

        <br><br>

       

        <label for="info_form"> Информация о пользователе:</label>
        <textarea class="reg_inputs3"   type="info" name="info"  placeholder="<?php echo htmlspecialchars($assoc_2['info']); ?>" id="info_form" required ></textarea>
        

        <br><br>

        <label for="Balans">Баланс:</label>
        <label for="Balans"><?php echo htmlspecialchars($assoc_2['Balans']); ?></label>
        <label for="Balans">ED</label>
        <br><br>
        
        <label for="Info">Информация о пользователе:</label> <?php echo htmlspecialchars($assoc_2['info']); ?>

        <br><br>
        



        <label for="access_input">Уровень доступа</label>
        <select name="access" id="access_input">
            <option value="<?php echo intval($assoc_2['access']); ?>">Текущий: <?php echo access($assoc_2['access']); ?></option>
            
            <option value="0">Пользователь</option>
            <option value="1">Администратор</option>
        </select> <br><br>

        <button class="submitButton2" type="submit" name="editProfile" class="">Сохранить</button>
        <a href="../../" class="">Назад</a>
    </form>
</div>
</form>
</div>

<?php
 
$user_Login = htmlspecialchars($assoc_2['Login']);

$sql = "SELECT * FROM $user_Login ORDER BY `transf_date` DESC";
if($result = mysqli_query($db, $sql)){
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    //echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>История переводов</th>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["transfhistory"] . "</td>";
            
        echo "</tr> ";

            echo "<td>" . $row["transf_date"] . "</td>";
    }
    echo "</table>";
    mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($db);
}
mysqli_close($db);
?>

