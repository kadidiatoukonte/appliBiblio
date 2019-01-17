<?php

declare(strict_types = 1);

class Admin
{
    protected   $name,
                $id,
                $mail,
                $mdp;

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
    public function setId( $id)
    {
        $id = (int) $id;
        $this->id = $id;
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

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }

    // Getters

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
                          
    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }
}