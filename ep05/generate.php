<?php

require __DIR__ . "/vendor/autoload.php";

use Faker\Provider\Lorem;
use Faker\Provider\Image;
use Source\Models\Post;

for($i = 0; $i < 1; $i++){
  $post = new Post();
  //$post->title = Lorem::text(80);
  $post->cover = Image::image("./images", 300, 150);
  $post->description = Lorem::paragraph(2, true); 
  var_dump($post);
}