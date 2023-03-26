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

        $logtrans2 = mysqli_fetch_assoc($logtrans);

        $balanstransfer = $_POST['balanstransfer'];

        $balans2 = htmlspecialchars($logtrans2['Balans']);
       

        $balansfinal = $balans - $balanstransfer;
        $balansfinal2 = $balans2 + $balanstransfer;
        


        $balansfinaltransfer = mysqli_real_escape_string($db, $balansfinal);
        $balansfinaltransfer2 = mysqli_real_escape_string($db, $balansfinal2);


        
        
      
        
        if (mysqli_query($db, "UPDATE Accounts SET Balans='$balansfinaltransfer2' WHERE `login`='$Logintransfer'")) {
            $balans = $balansfinal;
            
            
            echo 'Операция выполнена успешно!';
        } else {
            header('Refresh: 10');
            echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
        }
    
        

        if (mysqli_query($db, "UPDATE Accounts SET Balans='$balansfinaltransfer' WHERE `login`='$user_Login'")) {
            

            
            
            echo 'Операция выполнена успешно!';
        } else {
            header('Refresh: 10');
            echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
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

Баланс абонента:
<?php echo $balans2; ?><br>

Итог абонента: 
<?php echo $balansfinal2; ?><br>
Итог ваш: 
<?php echo $balansfinal; ?><br>


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