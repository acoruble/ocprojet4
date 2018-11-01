<?php ob_start();
  ?>
  <p class="text-light text-left">
    <?= $post->title() ?><br /><br />
    <?= $post->content() ?>
  </p>

  <?php
$chapterDisplay = ob_get_clean();
require('template.php');
