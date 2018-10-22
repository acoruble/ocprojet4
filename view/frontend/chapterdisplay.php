<?php ob_start();
  ?>
  <p class="text-light text-left">
    <?= $Post->title() ?><br /><br />
    <?= $Post->content() ?>
  </p>

  <?php
$chapterDisplay = ob_get_clean();
require('template.php');
