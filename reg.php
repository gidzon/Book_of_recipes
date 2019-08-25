<?php

include 'vendor/autoload.php';
include __DIR__.'/config/bd.php';

use App\User;
 

$user = new User();
$reg = $user->addUser($pdo);


