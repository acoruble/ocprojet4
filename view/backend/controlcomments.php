<?php ob_start();
  ?>
  <div class="container">
    <div class="row bg-primary text-light text-center border-0 shadow-lg rounded-top" style="">
      <div class="col-md-12 shadow-lg rounded-top" style="">
        <h1 class="shadow-lg" style="">Supprimer un commentaire existant :<br></h1>
      </div>
    </div>

    <!-- *****SELECTIONNER LE CHAPITRE A SUPPRIMER****************************************************************************************************************************************** -->

    <div class="row">
      <div class="bg-primary rounded-bottom text-center py-2 shadow-lg col-md-12" style="" >
        <ul class="nav nav-pills flex-column">
          <?php foreach ($listComments as $comments): ?>
            <form action="index.php?index.php?admin=controlcomments" method="post">
              <input type="hidden" name="idCommentsControl" style="size:0" value="<?= $comments->id() ?>">
              <input type="submit" name="commentsControl" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block" value="<?= $comments->pseudo() ?> a écrit <?= $comments->message() ?> à propos du chapitre : '<?= $comments->titleChapter() ?>', le <?= $comments->date() ?> et a été reporté <?= $comments->nbReport() ?> fois."><br>
            </form>
          <?php endforeach; ?>
        </ul>

  <?php
  $content = ob_get_clean();

  require('template.php');
