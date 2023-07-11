<!-- navbar -->

<?php
switch ($user['access']) {
    case 1:
        echo '<li class="nav-item"><a href="' . URL . '/admin/list" class="nav-link a-btn">Админ-панель</a></li>
              <li class="nav-item"><a href="' . URL . '/reg/" class="nav-link a-btn">Регистрация</a></li>';
        break;
}

switch (!$user) {
    case 1:
        echo '
                                    <li class="nav-item"><a href="' . URL . '/auth/" class="nav-link a-btn">Вход</a></li>
                                    <li class="nav-item"><a href="' . URL . '/reg/" class="nav-link a-btn">Регистрация</a></li>';
        break;
    case 0:
        echo '
                                    <li class="nav-item"><a href="' . URL . '" class="nav-link a-btn">Главная</a></li>                            
                                    <li class="nav-item"><a href="' . URL . '/profile/" class="nav-link a-btn">Личный кабинет</a></li>
                                    <li class="nav-item"><a href="' . URL . '/transfer/" class="nav-link a-btn">Перевод</a></li>
                                    <li class="nav-item"><a href="' . URL . '/test/" class="nav-link a-btn">тест</a></li>
                                    <li class="nav-item"><a href="' . URL . '/?logout" class="nav-link a-btn">Выход</a></li>';
                                    

        break;
}
?>