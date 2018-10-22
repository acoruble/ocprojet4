<!-- **********AFFICHER LES COMMENTAIRES ASSOCIES********************************************************************************* -->

<div class="row">
  <div class="col-md-12 bg-primary rounded-bottom py-2 shadow-lg text-center" style="">

    <?php foreach ($comments as $comment): ?>
      <p class="text-light">
        <?= $comment->pseudo() ?>
        <?= $comment->date() ?>
        <?= $comment->message() ?>
      </p>
      <p>
        <form action="index.php" method="post">
          <input type="hidden" name="IDComment" value=<?= $comment->id() ?>>
          <input type="submit" class="btn text-light btn-info text-center shadow-lg rounded" name="reportComment" value="Signaler ce commentaire !"><br>
        </form>
      </p>
    <?php endforeach; ?>
  </div>
</div>
