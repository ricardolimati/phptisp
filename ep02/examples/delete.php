<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;


$user = (new User())->findById(4);
if ($user) {
  $user->destroy();
}else{
  var_dump($user);
}

// $addr = new Address();
// $addr->add($user, "Rua Frederico Picarelli", "191F");
// $addr->save();

var_dump($user);
