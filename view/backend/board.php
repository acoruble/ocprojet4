<?php foreach ($listPost as $post): ?>
  <ul>
    <li>
      <?= $post->title() ?> <a href="index.php?admin=updatepost&id=<?= $post->id() ?>">Mettre à jour</a>
    </li>
  </ul>
<?php endforeach; ?>
