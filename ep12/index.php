<?php

use Source\Models\User;

require __DIR__ . "/vendor/autoload.php";

$output = true;

if($output){
    $users = (new User())->find()->fetch(true);
    foreach ($users as $user){
        var_dump($user->data());
    }
//    var_dump($users);
}
$create = false;
$read = false;
$edit = false;
