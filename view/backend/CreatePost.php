<?php ob_start();
  ?>

  <div class="container">
  <div class="row bg-primary text-light text-center border-0 shadow-lg rounded-top" style="">
    <div class="col-md-12 shadow-lg rounded-top" style="">

      <!-- *********CREATION NOUVEAU BILLET************************************************************************************************************* -->

      <h1 class="shadow-lg" style="">Créer un nouveau billet :<br></h1>
      <div class="row">
        <div class="col-md-12">
          <form action="index.php" method="post">
            <div class="form-group"> <small class="form-text text-muted"></small> </div>
            <div class="form-group"> <input type="text" class="form-control text-info" placeholder="Titre du chapitre" name="titre"> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="bg-primary rounded-bottom text-center py-2 shadow-lg col-md-12" style="">
        <textarea id="mytextarea" class="form-control form-control-lg text-primary text-left" name="contenu">Blablabla...</textarea>
      </br>
      <button type="submit" class="btn btn-info btn-lg">Publier<br></button>
    </form>
  </div>
</div>
</div>

<?php
$content = ob_get_clean();

require('template.php');
