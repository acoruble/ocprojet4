<?php ob_start();
  ?>

  <div class="container">
  <div class="row text-center" style="">
    <div class="col-md-12" style="">

      <!-- *********CREATION NOUVEAU BILLET************************************************************************************************************* -->

      <h1 class="text-info">Créer un nouveau billet :<br></h1>
      <div class="row">
        <div class="col-md-12">
          <form action="index.php?admin=createpost" method="post">
            <div class="form-group"> <small class="form-text"></small> </div>
            <div class="form-group"> <input type="text" class="form-control text-info" placeholder="Titre du chapitre" name="title"> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" style="">
        <textarea id="mytextarea" class="text-left" name="content">Blablabla...</textarea>
      </br>
      <button type="submit" class="btn btn-info btn-lg pull-right">Publier<br></button>
    </form>
  </div>
</div>
</div>

<?php
$content = ob_get_clean();

require('template.php');
