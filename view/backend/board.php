<?php ob_start();
?>
</br>
<div class="container">
  <div class="row mx-auto col-md-10 col-md-offset-2 table-responsive">
    <a href="index.php?admin=createpost" class="btn btn-info btn-xs pull-right">Ajouter un nouveau chapitre</a>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th class="text-center text-info">Titre du billet</th>
        </tr>
      </thead>
        <?php foreach ($listPost as $post): ?>
          <tr>
            <td class="text-center"><?= $post->title() ?></td>
            <td class="text-center bg-info">
              <a href="index.php?admin=updatepost&id=<?= $post->id() ?>" class="btn btn-light btn-xs">Modifier</a>
            </td>
            <td class="text-center">
              <a href="index.php?admin=deletepost&idChapterDelete=<?= $post->id() ?>" class="btn btn-info btn-xs">Supprimer</a>
            </td>
            <td class="text-center bg-info">
              <a href="index.php?admin=controlcomments&titleChapter=<?= $post->title() ?>&id=<?= $post->id() ?>" class="btn btn-light btn-xs">Gérer les commentaires</a>
            </td>
          </tr>
        <?php endforeach; ?>
    </table>
  </div>
</div>

  <?php
  $content = ob_get_clean();

  require('template.php');
