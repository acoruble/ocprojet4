<?php

// require 'CommentsManager.php';

/**
*
*/
class Comments extends CommentsManager
{

  protected $errors = [],
  $id,
  $titleChapter,
  $pseudo,
  $date,
  $message,
  $nbReport;

  // *************************************************************************************

  const PSEUDO_INVALIDE = 1;
  const MESSAGE_INVALIDE = 2;


  public function __construct(array $data = null)
  {
    if (!empty ($data)) {
      $this->hydrate($data);
    }
  }

  public function hydrate(array $data)
  {
    foreach ($data as $key => $value)
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

  public function setTitleChapter($titleChapter)
  {
    $this->titleChapter = $titleChapter;
  }

  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->errors[] = self::PSEUDO_INVALIDE;
    }
    else
    {
      $this->pseudo = $pseudo;
    }
  }

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function setMessage($message)
  {
    if (!is_string($message) || empty($message))
    {
      $this->errors[] = self::MESSAGE_INVALIDE;
    }
    else
    {
      $this->message = $message;
    }
  }

  public function setNbReport($nbReport)
  {
    $this->nbReport = (int) $nbReport;
  }

  ///////////////////////////////////////////GETTERS///////////////////////////////////////////////////////////////////////////////////////////

  public function errors()
  {
    return $this->errors;
  }

  public function id()
  {
    return $this->id;
  }

  public function titleChapter()
  {
    return $this->titleChapter;
  }

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function date()
  {
    return $this->date;
  }

  public function message()
  {
    return $this->message;
  }

  public function nbReport()
  {
    return $this->nbReport;
  }

}
