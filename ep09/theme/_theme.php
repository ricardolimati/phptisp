<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?=$head?>
  <link rel="stylesheet" href="<?= url('/theme/style.css') ?>">
</head>

<body>

  <nav class="main_nav">
    <?php
    if ($v->section("sidebar")) :
      echo $v->section("sidebar");
    else :
    ?>
      <a title="" href="<?= url() ?>">Home</a>
      <a title="" href="<?= url('contato') ?>">Contato</a>
      <a title="" href="<?= url('teste') ?>">Teste</a>
    <?php
    endif;

    ?>
  </nav>
  <main class="main_content">
    <?= $v->section('content'); ?>
  </main>
  <footer class="main_footer">
    <?= SITE; ?> - Todos os Direitos Reservados
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <?=$v->section("scripts");?>
</body>

</html>