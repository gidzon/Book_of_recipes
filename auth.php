<?php

include 'vendor/autoload.php';
include __DIR__.'/config/config.php';

use App\User;

$auth = new User();
$auth->authorization($pdo);

if (!empty($_SESSION['auth'])){
    echo '<a href="add.php">Добавить рецепт</a></br>
        <a href="exit.php">Выход</a></br>
        <a href="/">Главная</a>';
} else {
    echo '<a href="/form/reg.php">Регистрация</a></br>
        <a href="/form/auth.php">Авторизация</a>';
}