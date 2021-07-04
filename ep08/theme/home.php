<?php $v->layout("_theme"); ?>
<div class="users">
  <?php if ($users) :
    foreach ($users as $user) :
  ?>
      <article class="users_user">
        <h3><?= $user->first_name, " ", $user->last_name; ?></h3>
      </article>
    <?php
    endforeach;
  else :
    ?>
    <h4>Não existem usuarios cadastrados!</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quas facilis officia voluptatibus, soluta eveniet nesciunt quisquam rerum quo dignissimos, consequatur, consequuntur harum consectetur sint laborum suscipit pariatur in quibusdam!</p>
  <?php
  endif; ?>
</div>