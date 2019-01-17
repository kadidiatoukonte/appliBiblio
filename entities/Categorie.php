<?php

declare(strict_types = 1);

class Categorie
{
    protected   $name,
                $idCategorie;

    public function __construct(array $array)
    {
        $this->hydrate($array);
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

    // Setters
    
    /**
     * Set the value of id
     *
     * @param int $id
     * @return  self
     */ 
    public function setIdCategorie( $idCategorie)
    {
        $idCategorie = (int) $idCategorie;
        $this->idCategorie = $idCategorie;
        return $this;
    }
    
    /**
     * Set the value of name
     *
     * @param string $name
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }


    // Getters

    /**
     * Get the value of id
     */ 
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
}