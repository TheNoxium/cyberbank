<?php

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $Login =  htmlspecialchars($user['Login']);
    echo $Login;

    // sql to create table
    $sql = "CREATE TABLE `".$Login."` (reg_date TIMESTAMP)";

    if (mysqli_query($db, $sql)) {
        echo "Заебца табличка создана";
    } else {
        echo "Error ошибка ты еблан: " . mysqli_error($db);
    }

    mysqli_close($db);

?>


