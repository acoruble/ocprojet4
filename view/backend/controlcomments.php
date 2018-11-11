<?php ob_start();
?>
</br>
<div class="container">
  <div class="row mx-auto col-md-10 col-md-offset-2 table-responsive">
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th class="text-center">Pseudo</th>
          <th class="text-center">Date</th>
          <th class="text-center">Message</th>
          <th class="text-center">Nombre de report</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
        <?php foreach ($listComments as $comment): ?>
          <tr>
            <td class="text-center bg-info"><?= $comment->pseudo() ?></td>
            <td class="text-center"><?= $comment->date() ?></td>
            <td class="text-center  bg-info"><?= $comment->message() ?></td>
            <td class="text-center"><?= $comment->nbReport() ?></td>
            <td class="text-center bg-info">
              <!-- <button type="button" class="btn btn-" data-toggle="modal" data-target="#exampleModal">
                Supprimer
              </button> -->
              <a href="index.php?admin=deletecomment&id=<?= $comment->id() ?>" class="btn btn-light btn-xs">Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
  </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<?php
$content = ob_get_clean();

require('template.php');
