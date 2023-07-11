<?php require_once 'engine/config.php';

if (!$user)
{
    header('Location: ' . URL . '/auth');
    exit;
}
?>


<!doctype html>
<html lang="ru">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css">

<head>
    <?php require_once 'engine/head.php'; ?>
    <title>Авторизация</title>
</head>

<body>
    <?php
    include_once 'engine/navbar.php';
    require_once 'content.php';
    include_once 'engine/footer.php'
        ?>

</body>

</html>