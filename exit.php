<?php

include 'vendor/autoload.php';
include __DIR__.'/config/config.php';

use App\User;



if (!empty($_SESSION['auth'])){
    $exitUser = new User();
    $exitUser->exitUser();

    header('Location:/');
} else {
    exit;
}