<?php ob_start();

while($donnees = $BilletsById->fetch())
{
  ?>
  <p class="text-light text-left">
    <?php echo $donnees['titre']; ?><br /><br />
    <?php echo $donnees['contenu']; ?>
    <?php $grand_titre=$donnees['titre']; ?>
  </p>
  <?php
}
$BilletsById->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
