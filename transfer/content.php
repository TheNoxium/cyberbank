<pre>
    <?php

    $balans = htmlspecialchars($user['Balans']);
    $user_ID = intval($user['ID']);
    $user_Login = htmlspecialchars($user['Login']);

    if (isset($_POST['edit1'])) {

        mysqli_real_escape_string($db, $user['Login']);

        $logtransuser = mysqli_query($db, "SELECT * FROM `Accounts` WHERE `login`='$user_Login'");



        $logtransuser2 = mysqli_fetch_assoc($logtransuser);



        $Logintransfer = $_POST['logintransfer'];

        mysqli_real_escape_string($db, $_POST['logintransfer']);

        $logtrans = mysqli_query($db, "SELECT * FROM `Accounts` WHERE `login`='$Logintransfer'");

        if ($logtrans2 = mysqli_fetch_assoc($logtrans)) {

            $balanstransfer = $_POST['balanstransfer'];

            $balans2 = htmlspecialchars($logtrans2['Balans']);


            $balansfinal = $balans - $balanstransfer;
            $balansfinal2 = $balans2 + $balanstransfer;

            if ($balansfinal > 0) {

                $balansfinaltransfer = mysqli_real_escape_string($db, $balansfinal);
                $balansfinaltransfer2 = mysqli_real_escape_string($db, $balansfinal2);

                if ($Logintransfer !== $user_Login) {






                    if (mysqli_query($db, "UPDATE Accounts SET Balans='$balansfinaltransfer2' WHERE `login`='$Logintransfer'")) {
                        $balans = $balansfinal;
                        mysqli_query($db, "UPDATE Accounts SET Balans='$balansfinaltransfer' WHERE `login`='$user_Login'");

                        mysqli_query($db, "INSERT INTO $user_Login SET transfhistory = 'Перевод пользователю $Logintransfer в размере $balanstransfer. Остаток по счету : $balansfinal ', transf_date = '$today' ");
                        mysqli_query($db, "INSERT INTO $Logintransfer SET transfhistory = 'Перевод от пользователю $user_Login в размере $balanstransfer. Остаток по счету : $balansfinal2 ', transf_date = '$today' ");

                        echo 'Операция выполнена успешно!';
                        
                        header('Refresh: 5, url=../');
                        exit;





                    } else {
                        header('Refresh: 10');

                        echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
                    }

                } else {
                    echo 'Ошибка. НЕльзя переводить деньги себе.';
                }

            } else {
                echo 'Ошибка. НЕхватает денег.';
            }

        } else {


            echo 'Ошибка. НЕ ВЕРНЫЕ ДАННЫЕ.';
        }
    }




    ?>
</pre>

Ваш логин:
<?php echo $user_Login; ?><br>
Ваш айди:
<?php echo $user_ID; ?><br>

Ваш баланс:
<?php echo $balans; ?><br>

<!-- проверка балансов абаонента 

Баланс абонента:
<?php echo $balans2; ?><br>

Итог абонента:
<?php echo $balansfinal2; ?><br>
Итог ваш:
<?php echo $balansfinal; ?><br>

-->


<div id="edit">
    <form method="post">

        <h3>Перевод денег c акаунта
            <?php echo $user_Login; ?>
        </h3>

        <label for="logintransfer">Логин куда вы хотите послать бабки</label>
        <input name="logintransfer" type="text" id="logintransfer" placeholder="Введите логин" required>
        <br><br>

        <label for="balanstransfer">Сколько бабок вы хотите перевести </label>
        <input type=number name="balanstransfer" type="text" id="balanstransfer" placeholder="Введите сумму" required>
        <br><br>

        <button type="submit" name="edit1" class="">Сохранить</button>
        <br><br><br>
        <a href="../" class="">Назад</a>

    </form>
</div>