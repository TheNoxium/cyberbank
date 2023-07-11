<?php
$user_ID = intval($user['ID']);

if (isset($_POST['edit'])) {
    $info = mysqli_real_escape_string($db, $_POST['info']);

    if (mysqli_query($db, "UPDATE Accounts SET info='$info' WHERE id = '$user_ID';")) {
        header("Refresh: 3; ../../profile");
        echo 'Операция выполнена успешно!';
    } else {
        header('Refresh: 10');
        echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
    }
}
?>

<div id="edit">
    <form method="post">

        <h3>Редактирование вашего профиля №
            <?php echo $user_ID; ?>
        </h3>


        <label for="info_form"> Информация о себе:
            <textarea textarea autofocus type="info" name="info" placeholder="<?php echo htmlspecialchars($user['info']); ?>" id="info_form" required></textarea>
        </label>

        <br><br>

        <button type="submit" name="edit" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>