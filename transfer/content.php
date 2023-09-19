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
        $messagetransfer = mysqli_real_escape_string($db, $_POST['messagetransfer']);

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

                        mysqli_query($db, "INSERT INTO $user_Login SET transfhistory = 'Перевод пользователю $Logintransfer в размере $balanstransfer. Остаток по счету : $balansfinal ', transf_date = '$today', transfmessage = '$messagetransfer' ");
                        mysqli_query($db, "INSERT INTO $Logintransfer SET transfhistory = 'Перевод от пользователю $user_Login в размере $balanstransfer. Остаток по счету : $balansfinal2 ', transf_date = '$today', transfmessage = '$messagetransfer'");

                        echo '<span style="color: #00ff00; ">Операция выполнена успешно!';
                        
                        header('Refresh: 5, url=../');
                        exit;





                    } else {
                        header('Refresh: 10');

                        echo '<span style="color: #ff0000; "> Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
                    }

                } else {
                    echo '<span style="color: #ff0000; "> Ошибка. Нельзя переводить деньги себе.';
                }

            } else {
                echo '<span style="color: #ff0000; "> Ошибка. Нехватает денег.';
            }

        } else {


            echo '<span style="color: #ff0000; "> Ошибка. Полльзователь с таким логином не найден.';
        }
    }




    ?>
</pre>

Ваш логин:
<?php echo $user_Login; ?><br>


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


<div id="nav-link ">

     <div class="submitButton3 ">
     <?php

     $balans = htmlspecialchars($user['Balans']);
    $user_ID = intval($user['ID']);
    $user_Login = htmlspecialchars($user['Login']);
    ?>
<div id="edit">
    <form method="post">

        <h3>Перевод денег c акаунта
            <?php echo $user_Login; ?>
        </h3>

        <label for="logintransfer">Логин кому вы хотите послать средства</label>
        <input class="reg_inputs1" name="logintransfer" type="text" id="logintransfer" placeholder="Введите логин" required>
        <br><br>

        <label for="balanstransfer">Сколько средств вы хотите перевести </label>
        <input class="reg_inputs1" type=number name="balanstransfer" type="text" id="balanstransfer" placeholder="Введите сумму" required>
        <br><br>

        <label for="balanstransfer">Сообщение пользователю </label>
        <input class="reg_inputs1" type=text name="messagetransfer" type="text" id="messagetransfer" placeholder="Введите сообщение" required>
        <br><br>

        <button class="submitButton2" type="submit" name="edit1" >Перевести</button>
        <br><br><br>
        
        </div>
    </form>
</div>