<?php


if (isset($_POST['edit1'])) {

    $logtrans = mysqli_query($db,"SELECT * FROM `Accounts` WHERE `login`='govno7'");
    $logtrans = mysqli_fetch_all($logtrans);
    var_dump($Login);


}




?>




<div id="edit">
    <form method="post">

        <h3>Редактирование вашего профиля №
            <?php echo $user_ID; ?>
        </h3>

        <label for="logintransfer">Логин куда вы хотите послать бабки</label>
        <input name="logintransfer" type="text" id="logintransfer" placeholder="Введите логин"
            value="<?php echo htmlspecialchars($user['logintransfer']); ?>" required>
        <br><br>

        <button type="submit" name="edit1" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>