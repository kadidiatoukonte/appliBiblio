<?php

class AdminManager 
{

  private $_db;

  /**
   * Constructor
   *
   * @param PDO $db
   */
  public function __construct(PDO $db) {
    $this->setDb($db);
  }

  /**
   * Set the value of _db
   *
   * @param PDO $db
   * @return  self
   */ 
  public function setDb(PDO $db) {
    $this->_db = $db;
    return $this;
  }

  /**
   * Get the value of _db
   */ 
  public function getDb() {
    return $this->_db;
  }

  /**
     * verif if admin exist
     *
     * @param Admin $admin
     * @return self
     */
    public function verifAdmin(Admin $admin)
    {
        $query = $this->getBdd()->prepare('SELECT * FROM admins WHERE name = :name');
        $query->bindValue(':name', $admin->getName(), PDO::PARAM_STR);

        $query->execute();
        $admins = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($admins as $getAdmin) {
            return new Admin($getAdmin);
        }
    }

    /**
     * verif if admin as disponibility for sign up
     *
     * @param Admin $admin
     * @return self
     */
    public function verifAdminDispo(Admin $admin)
    {
        $query = $this->getdb()->prepare('SELECT * FROM admins WHERE name = :name');
        $query->bindValue(':name', $admin->getName(), PDO::PARAM_STR);
        $query->execute();
        $admins = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($admins as $getAdmin) {
            return new Admin($getAdmin);
        }
    }

    /**
     * create admin
     *
     * @param Admin $admin
     * @return self
     */
    public function createAdmin(Admin $admin)
    {
        $query = $this->gedb()->prepare('INSERT INTO admins(name, mdp, mail) VALUES(:name, :mdp, :mail)');
        $query->bindValue(':name', $admin->getName(), PDO::PARAM_STR);     
        $query->bindValue(':mail', $admin->getMail(), PDO::PARAM_STR);
        $query->bindValue(':mdp', $admin->getMdp(), PDO::PARAM_STR);
        $query->execute();
    }
    /**
     * update admin
     *
     * @param Admin $admin
     * @return self
     */
    public function updateAdmin(Admin $admin)
    {
        $updatedb = $this->_db->prepare('UPDATE admin SET mail = :mail WHERE id = :id');
        $updatedb->bindValue(':id', $admin->getId(), PDO::PARAM_INT);
        $updatedb->bindValue(':mail', $admin->getMail(), PDO::PARAM_STR);
        $updatedb->execute();
    }

  
  /**
   * Get all admins. It returns an array of objects $admin
   *
   * @return array $arrayAdmins
   */
  public function getAdmins() 
  {
    $arrayOfAdmins = [];
    $query = $this->getDb()->query('SELECT * FROM admins');
    $admins = $query->fetchAll(PDO::FETCH_ASSOC);

    // A chaque tour, on instancie un nouvel objet User qu'on stocke dans $arrayOfAdmins[]
    foreach ($admins as $admin) {
      $arrayOfAdmins[] = new Admin($admin);
    }
    // On renvoie le tableau contenant tous nos objets Admin
    return $arrayOfAdmins;
  }

  public function getAdmin(string $name)
	{
		$query = $this->getDb()->prepare('SELECT * FROM admins WHERE name = :name');
		$query->bindValue("name", $name, PDO::PARAM_STR);
		$query->execute();
	}

  /**
   * Add admin in DB
   *
   * @param Admin $admin
   */
  public function addAdmin(Admin $admin)
  {
    $query = $this->getDb()->prepare('INSERT INTO admins(name, mail, mdp) VALUES(:name, :mail, :mdp)');
    $query->bindValue(':name', $admin->getName(), PDO::PARAM_STR);
    $query->bindValue(':mail', $admin->getMail(), PDO::PARAM_STR);
    $query->bindValue(':mdp', $admin->getMdp(), PDO::PARAM_STR);
    $query->execute();
  }

}


 ?>
