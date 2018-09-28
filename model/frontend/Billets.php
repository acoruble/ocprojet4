<?php

require 'BilletsManager.php';

/**
*
*/
class Billets extends BilletsManager
{

  protected $id,
            $titre,
            $contenu,
            $erreurs = [];

  const AUTEUR_INVALIDE = 1;
  const TITRE_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;


  public function __construct(array $donnees = null)
  {
    if (!empty ($donnees)) {
      echo 'Voici le constructeur !!!';
      $this->hydrate($donnees);
    }
  }

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);
      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }
  ///////////////////////////////////////////SETTERS///////////////////////////////////////////////////////////////////////////////////////////
  public function setId($id)
  {
    $this->id = (int) $id;
  }

  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }
    else
    {
      $this->titre = $titre;
    }
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }
    else
    {
      $this->contenu = $contenu;
    }
  }

  ///////////////////////////////////////////GETTERS///////////////////////////////////////////////////////////////////////////////////////////

  public function erreurs()
  {
    return $this->erreurs;
  }

  public function id()
  {
    return $this->id;
  }

  public function titre()
  {
    return $this->titre;
  }

  public function contenu()
  {
    return $this->contenu;
  }

}

?>
