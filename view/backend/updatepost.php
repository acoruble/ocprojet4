<?php ob_start();
  ?>

    <!-- *********************AFFICHER LE TEXTE A MODIFIER***************************************************************************************************************** -->
    <div class="row">
      <div class="container">
      <div class="row bg-info text-light text-center border-0 shadow-lg rounded-top" style="">
        <div class="col-md-12 shadow-lg rounded">

          <!-- *********CREATION NOUVEAU BILLET************************************************************************************************************* -->

          <h1 class="shadow-lg" style="">Modifier un billet existant:<br></h1>
          <div class="row">
            <div class="col-md-12">
              <form action="index.php?admin=postupdate" method="post">
                <input type="hidden" name="id" style="size:0" value="<?= $post->id() ?>">
                <div class="form-group"> <small class="form-text text-muted"></small> </div>
                <div class="form-group"> <input type="text" class="form-control text-info" placeholder="Titre du chapitre" name="title" value='<?= $post->title() ?>'> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="bg-info rounded-bottom text-center shadow-lg col-md-12">
            <textarea id="mytextarea" class="form-control bg-light form-control-lg text-info text-left" name="content"><?= $post->content() ?></textarea>
          </br>
          <button type="submit" class="btn btn-light text-info btn-lg">Modifier<br></button>
        </form>
      </div>
    </div>
    </div>

    </div>
  </div>

  <?php
  $content = ob_get_clean();
  require('template.php');
