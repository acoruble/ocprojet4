<?php
require ('model/frontend/Billets.php');

$Billets = new Billets();
$ListeBillets = $Billets->getListeBillets();

if (isset($_GET["chapitreClique"]))
{
  $BilletsById = $Billets->getBillets($_GET["chapitreClique"]);
  require ('vue/chapitrechoisi.php');
}

else
{
  $firstBillet = $Billets->getFirstBillet();
  require ('vue/pagedefault.php');
}

?>
