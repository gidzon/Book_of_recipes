<?php

include 'vendor/autoload.php';
include __DIR__.'/config/config.php';

use App\User;



if ($_SESSION['auth'] or $_SESSION['avtorization']){
    $exitUser = new User();
    $exitUser->exitUser();

    header('Location:/');
} else {
    exit;
}