<?php ob_start();
  ?>

  <form method="post" action="index.php?admin=log">
      <fieldset>
      <legend>Connexion</legend>
      <p>
      <label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" /><br />
      <label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
      </p>
      </fieldset>
      <p><input type="submit" value="Connexion" /></p></form>

  <?php
  $content = ob_get_clean();

  require('template.php');
