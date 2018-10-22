  <!-- ********************************************List DES CHAPITRES******************************************** -->

        <div class="col-3 col-md-3 bg-primary rounded border-0 shadow-lg">
          <h1 class="text-center text-light">Liste des chapitres</h1>
          <ul class="nav nav-pills flex-column">

            <?php foreach ($listPosts as $post): ?>
              <form action="index.php" method="get">
                <input type="hidden" name="action" style="size:0" value="selectChapter">
                <input type="hidden" name="PostClick" style="size:0" value="<?= $post->id() ?>">
                <input type="submit" name="titleChapter" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize" value="<?= $post->title() ?>"><br>
              </form>
            <?php endforeach; ?>

          </ul>
        </div>
