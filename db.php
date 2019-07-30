<?php 
    $connection = mysqli_connect('ftp.bnikitchuk.icu', 'bogdan', 'kzL4B8g9vUNPS5q', 'hotdogs');
    if (!$connection) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>