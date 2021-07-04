<?php

require  __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Cropper\Cropper;
use Faker\Factory;

$faker = Factory::create("pt_br");
$generate = false;

if ($generate){
    for($img = 0; $img < 3; $img++){
        $faker->image(__DIR__. "/images", 600, 300);
    }
}
$c = new Cropper("images/cache");

for($image = 1; $image < 4; $image++){
    ?>
    <article>
        <h1>Imagem <?=$image?>.jpg</h1>
        <img src="images/<?=$image?>.jpg" />
        <img src="<?=$c->make("images/{$image}.jpg", 300, 300);?>" />
        <img src="<?=$c->make("images/{$image}.jpg", 300, 150);?>" />
        <img src="<?=$c->make("images/{$image}.jpg", 50, 50);?>" />
    </article>
<?php
}

//$c->flush("2.jpg");