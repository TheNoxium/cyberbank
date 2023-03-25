
<pre>
    <?php

if (isset($_POST['edit1'])) {


$Login = $_POST['logintransfer'];

mysqli_real_escape_string($db, $_POST['logintransfer']);
    
$logtrans = mysqli_query($db,"SELECT * FROM `Accounts` WHERE `login`='$Login'");

$logtrans2 = mysqli_fetch_assoc($logtrans);



$balans2 = htmlspecialchars($logtrans2['Balans']);
$balans = htmlspecialchars($user['Balans']);

echo $balans - $balans2;

}
?>
</pre>


<div id="edit">
    <form method="post">

        <h3>Редактирование вашего профиля №
            <?php echo $user_ID; ?>
        </h3>

        <label for="logintransfer">Логин куда вы хотите послать бабки</label>
        <input name="logintransfer" type="text" id="logintransfer" placeholder="Введите логин"
            value="<?php echo htmlspecialchars($user['login']); ?>" required>
        <br><br>

        <button type="submit" name="edit1" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>