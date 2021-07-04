<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;


$user = (new User())->findById(3);
$user->first_name = "Isabelly";
$user->save();

// $addr = new Address();
// $addr->add($user, "Rua Frederico Picarelli", "191F");
// $addr->save();

var_dump($user);