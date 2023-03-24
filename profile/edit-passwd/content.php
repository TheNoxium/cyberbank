<?php
$id = intval($user['ID']);

if (isset($_POST['edit-passwd']))
{
    $Password = mysqli_real_escape_string($db, ($_POST['Password']));

    if (mysqli_query($db,"UPDATE Accounts SET Password='$Password' WHERE id = '$id';"))
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
<div id="edit-passwd">
    <form method="post">

        <h3>Редактирование пароля к аккаунту № <?php echo $id; ?></h3>

        <label for="password_input">Пароль</label>
        <input name="Password" type="text" id="password_input" placeholder="<?php echo htmlspecialchars($user['Password']); ?>" required>

        <br><br>

        <button type="submit" name="edit-passwd" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>