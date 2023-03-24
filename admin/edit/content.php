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

        if (mysqli_query($db,"UPDATE Accounts SET Login='$Login',Password='$Password',access='$access' WHERE id = '$id';"))
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

<div id="edit-bloc">
    <form method="post">

        <label for="login_input">Логин</label>
        <input name="Login" type="text" id="login_input" placeholder="Введите логин" value="<?php echo htmlspecialchars($assoc_2['Login']); ?>" required>

        <br><br>

        <label for="password_input">Пароль</label>
        <input name="Password" type="text" id="password_input" placeholder="<?php echo htmlspecialchars($assoc_2['Password']); ?>" required>

        <br><br>

        <label for="access_input">Уровень доступа</label>
        <select name="access" id="access_input">
            <option value="<?php echo intval($assoc_2['access']); ?>">Текущий: <?php echo access($assoc_2['access']); ?></option>
            <option disabled>|||||||||||||"</option>
            <option value="0">Пользователь</option>
            <option value="1">Администратор</option>
        </select> <br><br>

        <button type="submit" name="editProfile" class="">Сохранить</button>

    </form>
</div>