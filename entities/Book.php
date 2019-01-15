<?php

declare(strict_types = 1);

class Book
{
    protected   $id,
                $title,
                $description,
                $author,
                $release_date,
                $available,
                $categorie_id,
                $image_id,
                $user_id;

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
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /*
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Set the value of release_date
     *
     * @return  self
     */ 
    public function setRelease_date($release_date)
    {
                    $this->release_date = $release_date;

                    return $this;
    }

    /**
     * Set the value of available
     *
     * @return  self
     */ 
    public function setAvailable($available)
    {
                    $this->available = $available;

                    return $this;
    }

    /**
     * Set the value of categorie_id
     *
     * @return  self
     */ 
    public function setCategorie_id($categorie_id)
    {
                    $this->categorie_id = $categorie_id;

                    return $this;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
                    $this->user_id = $user_id;

                    return $this;
    }

    /**
     * Set the value of image_id
     *
     * @return  self
     */ 
    public function setImage_id($image_id)
    {
                    $this->image_id = $image_id;

                    return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
                    return $this->title;
    }

    /**
    * Get the value of description
    */ 
    public function getDescription()
    {
                    return $this->description;
    }

    /**
    * Get the value of author
    */ 
    public function getAuthor()
    {
                    return $this->author;
    }

    /**
    * Get the value of release_date
    */ 
    public function getRelease_date()
    {
                    return $this->release_date;
    }

    /**
    * Get the value of available
    */ 
    public function getAvailable()
    {
                    return $this->available;
    }

    /**
    * Get the value of categorie_id
    */ 
    public function getCategorie_id()
    {
                    return $this->categorie_id;
    }

    /**
    * Get the value of image_id
    */ 
    public function getImage_id()
    {
                    return $this->image_id;
    }

    /**
    * Get the value of user_id
    */ 
    public function getUser_id()
    {
                    return $this->user_id;
    }
}