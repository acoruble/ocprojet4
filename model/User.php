<?php

/**
*
*/
class User extends UserManager
{

  protected $id,
            $pseudo,
            $password,
            $name;

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

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->errors[] = self::title_INVALID;
    }
    else
    {
      $this->pseudo = $pseudo;
    }
  }

  public function setPassword($password)
  {
    if (!is_string($password) || empty($password))
    {
      $this->errors[] = self::content_INVALID;
    }
    else
    {
      $this->password = $password;
    }
  }

  public function setName($name)
  {
    if (!is_string($name) || empty($name))
    {
      $this->errors[] = self::content_INVALID;
    }
    else
    {
      $this->name = $name;
    }
  }

  public function id()
  {
    return $this->id;
  }

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function password()
  {
    return $this->password;
  }

  public function name()
  {
    return $this->name;
  }

}
