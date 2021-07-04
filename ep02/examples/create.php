<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;
use Source\Models\Address;


$user = new User();

$user->first_name = 'Vivian';
$user->last_name = 'de Oliveira Lima';
$user->genre = 'F';

$user->save();

// $addr = new Address();
// $addr->add($user, "Rua Frederico Picarelli", "191F");
// $addr->save();

var_dump($user);