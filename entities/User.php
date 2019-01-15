<?php

declare(strict_types = 1);

class Book
{
    protected $id,
              $firstname,
              $lastname,
              $nb_book,
              $identifiant;

    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
                return $this->firstname;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
                return $this->lastname;
    }

    /**
     * Get the value of nb_book
     */ 
    public function getNb_book()
    {
                return $this->nb_book;
    }

    /**
     * Get the value of identifiant
     */ 
    public function getIdentifiant()
    {
                return $this->identifiant;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
                    $this->firstname = $firstname;

                    return $this;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
                    $this->lastname = $lastname;

                    return $this;
    }

    /**
     * Set the value of nb_book
     *
     * @return  self
     */ 
    public function setNb_book($nb_book)
    {
                    $this->nb_book = $nb_book;

                    return $this;
    }

    /**
     * Set the value of identifiant
     *
     * @return  self
     */ 
    public function setIdentifiant($identifiant)
    {
                    $this->identifiant = $identifiant;

                    return $this;
    }
}    