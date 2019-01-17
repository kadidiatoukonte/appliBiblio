<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Image
 */
class ImageManager
{
    private $_db;

    /**
     * Constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Set the value of $_db
     *
     * @param PDO $db
     * return self
     */
    public function setDb(PDO $db)
    {
        $this->_db = $db;
        return $this;
    }

    /**
     * Get the value of $_db
     *
     * @return $_db
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Add image to the database
     *
     * @param Image $image
     */
    public function add(Image $image)
    {
        $query = $this->getDb()->prepare('INSERT INTO images(src, alt) VALUES (:src, :alt)');
        $query->bindValue("src", $image->getSrc(), PDO::PARAM_STR);
        $query->bindValue("alt", $image->getAlt(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Get all images
     *
     */
    public function getImages()
    {
        $arrayOfImages = [];
        $query = $this->getDb()->query('SELECT * FROM images');

        // On récupère un tableau contenant plusieurs tableaux associatifs
        $dataImages = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dataImages as $dataImage) {
            // On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfImages
            $arrayOfImages[] = new Image($dataImage);
        }
        return $arrayOfImages;
    }

    /**
     * Get an image by id
     *
     * @param integer $id
     * @return Image
     */
    public function getImage(int $id)
    {
        $id = (int) $id;
        $query = $this->getDb()->prepare('SELECT * FROM images WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();

        $dataImage = $query->fetch(PDO::FETCH_ASSOC);
        return new Image($dataImage);
    }

    /**
     * Update image
     *
     * @param Image $image
     */
    public function update(Images $image)
    {
        $query = $this->getDb()->prepare('UPDATE images SET src = :src, alt = :alt WHERE id = :bookid');
        $query->bindValue(':src', $image->getSrc(), PDO::PARAM_STR);
        $query->bindValue(':alt', $image->getAlt(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete image
     *
     * @param integer $id
     */
    public function delete(int $id)
    {
        $query = $this->getDb()->prepare('DELETE FROM images WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();
    }
    
    // public function getLastImage()
    // {
    //     $query = $this->getDb()->query('SELECT * FROM images ORDER BY image_id DESC LIMIT 1');
    //     $imageLast = $query->fetch(PDO::FETCH_ASSOC);
    //     $objetImage = new image($imageLast);
    //     return $objetImage;
    // }
}
