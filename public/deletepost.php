<?php ob_start();
  ?>
  <div class="container">
    <div class="row bg-primary text-light text-center border-0 shadow-lg rounded-top" style="">
      <div class="col-md-12 shadow-lg rounded-top" style="">
        <h1 class="shadow-lg" style="">Supprimer un billet existant :<br></h1>
      </div>

      <!-- *****SELECTIONNER LE CHAPITRE A SUPPRIMER****************************************************************************************************************************************** -->
      <div class="col-md-10">
        <?php foreach ($listPosts as $post): ?>
          <form action="index.php?admin=deletepost" method="post">
            <input type="hidden" name="idChapterDelete" style="size:0" value="<?= $post->id() ?>">
            <input type="submit" name="titleChapterDelete" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize" value="<?= $post->title() ?>"><br>
          </form>
        <?php endforeach; ?>
        </div>
      </form>
    </div>
  </div>
  <?php
  $content = ob_get_clean();

  require('template.php');
