<pre>
    <?php

    if (isset($_POST['edit1'])) {


        $Logintransfer = $_POST['logintransfer'];

        mysqli_real_escape_string($db, $_POST['logintransfer']);

        $logtrans = mysqli_query($db, "SELECT * FROM `Accounts` WHERE `login`='$Logintransfer'");

        $logtrans2 = mysqli_fetch_assoc($logtrans);

        $balanstransfer = $_POST['balanstransfer'];

        $balans2 = htmlspecialchars($logtrans2['Balans']);
        $balans = htmlspecialchars($user['Balans']);

        $balansfinal = $balans - $balanstransfer;
        echo $balansfinal;


        $balansfinaltransfer = mysqli_real_escape_string($db, $balansfinal);
       

        if (mysqli_query($db, "UPDATE Accounts SET Balans='$balansfinaltransfer' WHERE `login`='$Logintransfer'")) {
            
            echo 'Операция выполнена успешно!';
        } else {
            header('Refresh: 10');
            echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
        }




    }
    ?>
</pre>

Ваш баланс:
<?php echo htmlspecialchars($user['Balans']); ?>

<div id="edit">
    <form method="post">

        <h3>Редактирование вашего профиля №
            <?php echo $user_ID; ?>
        </h3>

        <label for="logintransfer">Логин куда вы хотите послать бабки</label>
        <input name="logintransfer" type="text" id="logintransfer" placeholder="Введите логин" required>
        <br><br>

        <label for="balanstransfer">Сколько бабок вы хотите перевести </label>
        <input name="balanstransfer" type="text" id="balanstransfer" placeholder="Введите сумму" required>
        <br><br>

        <button type="submit" name="edit1" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>