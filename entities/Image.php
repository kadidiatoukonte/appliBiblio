<?php

declare(strict_types = 1);

class Image
{
    protected $id;
    protected $src;
    protected $alt;

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
     * Get the value of id
     */ 
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Get the value of id
     */ 
    public function getAlt()
    {
        return $this->alt;
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
     * Set the value of id
     *
     * @return  self
     */ 
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }
}