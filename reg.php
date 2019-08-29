<?php

include 'vendor/autoload.php';
include __DIR__.'/config/config.php';

use App\User;
 

$user = new User();
$user->addUser($pdo);

if ($_SESSION['auth'] == true){
    echo 'пользователь авторизован</br>';
    echo '<a href="/">главная</a>';
} else {
    header('Location:/form/reg.php');
}
