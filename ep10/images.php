<?php

require __DIR__ . "/vendor/autoload.php";

$upload = new \CoffeeCode\Uploader\Image("storage", "files");

$files = $_FILES;
if(!empty($files['file'])) {
    $file = $files["file"];
    if(empty($file["type"]) || !in_array($file["type"], $upload::isAllowed())){
        echo "<p>Selecione uma imagem válida!</p>";
    }else{
        $uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME), 350);
        echo "<a href='{$uploaded}'>ARQUIVO</a>";

    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Send File:</h1>
    <input type="file" name="file">
    <button>Enviar</button>
</form>
<?php
if(!empty($files["images"])){
    $images = $files["images"];

    for($i = 0; $i < count($images["type"]); $i++) {
        foreach (array_keys($images) as $keys){
            $imageFiles[$i][$keys]= $images[$keys][$i];
        }
    }
    if(empty($imageFiles["type"]) ){
        echo "<p>Selecione uma imagem válida!</p>>";
    }elseif(!in_array($file["type"], $upload::isAllowed())){
        echo "<p>O arquivo {$file["name"]} não é valido</p>";
    }else{
        $uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME), 350);
        echo "<img src='$uploaded' />";
    }
    var_dump($imageFiles);
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>More Image:</h1>
    <input accept="image/jpeg, image/jpg, image/png" type="file" name="images[]" id="image" multiple>
    <button>Enviar</button>
</form>

