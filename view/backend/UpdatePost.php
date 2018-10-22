<?php ob_start();
  ?>

  <div class="container">
    <div class="row bg-primary text-light text-center border-0 shadow-lg rounded-top" style="">
      <div class="col-md-12 shadow-lg rounded-top" style="">
        <h1 class="shadow-lg" style="">Modifier un billet existant :<br></h1>
        <div class="row">
          <!-- *****SELECTIONNER LE CHAPITRE A MODIFIER****************************************************************************************************************************************** -->
          <form action="modifier2.php" method="post">
            <div class="col-md-9">
              <select class="list-group-item d-flex justify-content-between align-items-center text-info" name="chapitreamodifier" >
                <?php
                $reponse = $bdd->query ('SELECT titre FROM billets');
                while ($donnees = $reponse->fetch())
                {
                  ?>
                  <option><?php echo $donnees['titre']; ?></option>
                  <?php
                }
                $reponse->closeCursor();
                ?>
              </select>
            </div>
            <div class="col-md-3">
              <input type="submit" class="btn btn-info btn-lg" value="Valider">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-light bg-primary">
        <?php
        if (isset($_POST["chapitreamodifier"]))
        {
          ?><p class="text-light text-center">Vous modifiez le chapitre : "<?php echo $_POST["chapitreamodifier"] ?>"</p>
          <?php
        }
        else {
          ?><p class="text-light text-center">Merci de sélectionner un chapitre à modifier dans la liste déroulante.</p>
          <?php
        }
        ?>
      </div>
    </div>

    <!-- *********************AFFICHER LE TEXTE A MODIFIER***************************************************************************************************************** -->
    <div class="row">
      <div class="bg-primary rounded-bottom text-center py-2 shadow-lg col-md-12">
        <form action="modifier.php" method="post">
          <textarea name="contenu" class="form-control form-control-lg text-primary text-left">
            <?php
            if (isset($_POST["chapitreamodifier"])){
              $req = $bdd->prepare('SELECT contenu FROM billets WHERE titre=?');
              $req->execute(array($_POST["chapitreamodifier"]));
              while ($donnees = $req->fetch())
              {
                echo $donnees["contenu"];
              }
              $req->closeCursor();
            }
            else {
              echo "Merci de sélectionner un chapitre à modifier dans la liste déroulante.";
            }
            ?>
          </textarea>
          <input type="hidden" name="titreChapitre" value="
          <?php
          if (isset($_POST["chapitreamodifier"]))
          {
            echo $_POST["chapitreamodifier"];
          }
          else
          {
            echo "";
          }
          ?>
          "><br><br>
          <input type="submit" class="btn btn-info btn-lg" value="Mettre à jour">
        </form>
      </div>
    </div>
  </div>

  <?php
  $content = ob_get_clean();

  require('template.php');
