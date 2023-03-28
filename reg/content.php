<?php



if (isset($_POST['reg'])) {
    $Login = mysqli_real_escape_string($db, $_POST['Login']);
    $Password = mysqli_real_escape_string($db, ($_POST['Password']));
    $access = mysqli_real_escape_string($db, $_POST['access']);
    $Balans = mysqli_real_escape_string($db, ($_POST['Balans	']));

    $regCheck = "SELECT Login FROM Accounts WHERE Login = '$Login'";
    $getValue = mysqli_query($db, $regCheck);

    if (mysqli_num_rows($getValue) > 0)
        echo '<span style="color: #ff0000; ">Логин занят</span>';
    else if (!mysqli_query($db, "INSERT INTO Accounts (Login,Password,access,Balans) VALUES ('$Login','$Password',0,0) ")) {
        header('Refresh: 10');
        echo 'Произошла какая-то ошибка. <s>Страница обновится через 10 секунд</s>';
    } else {
        if (isset($Login, $Password)) {
            if ($result = !authentication($Login, $Password)) {
                echo '<span style="color: #ff0000; ">Произошла неизвестная ошибка</span>';
            } else {
                $_SESSION = array(
                    'Login' => $Login,
                    'Password' => $Password
                );
                //создание таблички
                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                echo $Login;


                $sql = "CREATE TABLE `" . $Login . "` (auth_date TIMESTAMP)";

                if (mysqli_query($db, $sql)) {
                    echo "Заебца табличка создана";
                } else {
                    echo "Error ошибка ты еблан: " . mysqli_error($db);
                }

                //запись даты 
                if (mysqli_query($db, "INSERT INTO $Login (auth_date) VALUES (NOW())")) {


                    echo 'Операция выполнена успешно!';






                } else {


                    echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
                }

                $sql = "ALTER TABLE $Login ADD transfhistory TEXT ";
 
                if ($db->query($sql) === TRUE) {
                   echo "Столбец успешно создан";
                } else {
                   echo "Ошибка создание столбца" . $db->error;
                }
                mysqli_close($db);
                //header('Location: ' . URL);
                exit;
            }
        }
    }
}
?>


<form id="reg_form" method="POST">
    <b>Регистрация</b><br><br>

    <br><br>

    <label for="login_form"> Логин:
        <input type="text" name="Login"  pattern="^[^\s]+(\s.*)?$" placeholder="Введите ваш логин" id="login_form" required />
    </label>

    <br>

    <label for="password_form"> Пароль:
        <input type="password" name="Password" placeholder="Введите ваш пароль" id="password_form" required />
    </label>

    <br>
    <br>

    <button type="submit" name="reg">Сохранить изменения</button>
    <button type="reset">Сбросить</button>
</form>

<a href="<?php echo URL ?>">На главную</a>