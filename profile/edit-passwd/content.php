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

<div id="nav-link ">

     <div class="submitButton3 ">
<div id="edit-passwd">
    <form method="post">

        <h3>Редактирование пароля к аккаунту № <?php echo $id; ?></h3>

        <label for="password_input">Пароль</label>
        <input  class="reg_inputs1" name="Password" type="text" id="password_input" placeholder="<?php echo htmlspecialchars($user['Password']); ?>" required>

        <br><br>

        <button class="submitButton2" type="submit" name="edit-passwd" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>
</form>
</div>