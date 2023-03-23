<form id="reg_form" method="POST">
    <b>Регистрация</b><br><br>

    <br><br>

    <label for="login_form"> Логин:
        <input type="text" name="Login" placeholder="Введите ваш логин" id="login_form" required/>
    </label>

    <br>

    <label for="password_form"> Пароль:
        <input type="password" name="Password" placeholder="Введите ваш пароль" id="password_form" required/>
    </label>

    <br>
    <br>

    <button type="submit" name="reg">Сохранить изменения</button>
    <button type="reset">Сбросить</button>
</form>

<a href="<?php echo URL ?>">На главную</a>