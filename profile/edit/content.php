<?php
$user_ID = intval($user['ID']);

if (isset($_POST['edit']))
{
    $Login = mysqli_real_escape_string($db, $_POST['Login']);

    if (mysqli_query($db,"UPDATE Accounts SET Login='$Login' WHERE id = '$user_ID';"))
    {
        header("Refresh: 3; ../../profile");
        echo 'Операция выполнена успешно!';
    }
    else
    {
        header('Refresh: 10');
        echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
    }
}
?>

<div id="edit">
    <form method="post">

        <h3>Редактирование вашего профиля №<?php echo $user_ID; ?></h3>

        <label for="login_input">Логин</label>
        <input name="Login" type="text" id="login_input" placeholder="Введите логин" value="<?php echo htmlspecialchars($user['Login']); ?>" required>

        <br><br>

        <button type="submit" name="edit" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>