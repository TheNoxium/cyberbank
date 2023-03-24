<?php

require_once '../../engine/config.php';

if (!$user)
{
    header('Location: ' . URL . '/auth');
    exit;
}
?>


<!doctype html>
<html lang="ru">

<head>
    <?php require_once '../../engine/head.php'; ?>
    <title>Регистрация</title>
</head>

<body>
    <?php
    include_once '../../engine/navbar.php';
    require_once 'content.php';
    include_once '../../engine/footer.php'
        ?>

</body>

</html>