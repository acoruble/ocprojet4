<?php ob_start();

while($donnees = $firstBillet->fetch())
{
  ?>
  <p class="text-light text-left">
    <?php echo $donnees['titre']; ?><br /><br />
    <?php echo $donnees['contenu']; ?>
    <?php $grand_titre=$donnees['titre']; ?>
  </p>
  <?php
}
$firstBillet->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
