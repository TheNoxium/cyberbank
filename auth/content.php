

<div id="auth-bloc">
<div class="auth">

<b>Банк Найт Сити</b><br><br>

    <form method="post">
        <label for="login_input">Логин</label>
        <input  class="auth_inputs" name="Login" type="text" id="login_input" placeholder="Введите логин" required>
        <br><br>
        <label for="password_input">Пароль</label>
        <input class="auth_inputs" name="Password" type="password" id="password_input" placeholder="Введите пароль">
        <button class="submitButton2" type="submit" class="">Войти</button>
    </form>
</div>
</div>
</div>
<?php


$login = $_POST['Login']; //Переменная Login
$password = $_POST['Password']; //Переменная Password
if (!$user) {
    if (isset($login, $password)) {
        if ($result = !authentication($login, $password)) {
            echo '<span style="color: #ff0000; ">Данные введены не верно</span><br>';
        } else {
            $_SESSION = array(
                'Login' => $login,
                'Password' => $password
            );
            $Login2 = mysqli_real_escape_string($db, $_POST['Login']);
            //запись даты аутефикации
            if (mysqli_query($db, "INSERT INTO $Login2 SET  auth_date = '$today' ")) {


                echo 'запись даты регестрации  в таблицуОперация выполнена успешно!';


            } else {


                echo 'Ошибка. запись даты регестрации  в таблицу';
            }

           header('Location: ' . URL . '/');
            exit;
        }
    }
} else {
    header('Location: ' . URL);
    exit;
}
?>