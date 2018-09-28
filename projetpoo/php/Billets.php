<?php
class Billets
{

  private $_id;
  private $_titre;
  private $_contenu;

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

  public function __construct($titre, $contenu)
  {
    echo "Voici le constructeur !";
    $this->setTitre($titre);
    $this->setContenu($contenu);
  }

  public function setId($id)
  {
    $this->_id=$id;
  }

  public function setTitre($titre)
  {
    $this->_titre=$titre;
  }

  public function setContenu($contenu)
  {
    $this->_contenu=$contenu;
  }

  public function id(){
    return $this->_id;
  }

  public function titre()
  {
    return $this->_titre;
  }

  public function contenu()
  {
    return $this->_contenu;
  }
}
