<div id="auth-bloc">
    <form method="post">
        <label for="login_input">Логин</label>
        <input name="Login" type="text" id="login_input" placeholder="Введите логин" required>
        <br><br>
        <label for="password_input">Пароль</label>
        <input name="Password" type="password" id="password_input" placeholder="Введите пароль" required>
        <button type="submit" class="">Войти</button>
    </form>
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
            if (mysqli_query($db, "INSERT INTO $Login2 (auth_date) VALUES (NOW())")) {


                echo 'Операция выполнена успешно!';






            } else {


                echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
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