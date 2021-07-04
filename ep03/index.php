<?php
require __DIR__ . "/vendor/autoload.php";

use Source\Support\Email;

$email = new Email();

$email->add(
  "Olá Mundo meu primeiro email!",
  "<h1>Testando</h1>",
  "Ricardo Lima",
  "ricardodreamsites@gmail.com"
)->attach(
  "files/foto1.jpg",
  "FSPHP"
)->send();

if(!$email->error()){
  var_dump(true);
}else{
  echo $email->error()->getMessage();
}
