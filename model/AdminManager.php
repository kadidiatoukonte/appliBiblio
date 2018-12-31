<?php

class AdminManager {
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
     * verif if user exist
     *
     * @param User $user
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
     * verif if user as disponibility for sign up
     *
     * @param User $user
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
     * create user
     *
     * @param User $user
     * @return self
     */
    public function createAdmin(Admin $admin)
    {
        $query = $this->gedb()->prepare('INSERT INTO admins(name, password, verifConnect) VALUES(:name, :password, :verifConnect)');
        $query->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $query->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':verifConnect', $user->getVerifConnect(), PDO::PARAM_INT);
        $query->execute();
    }
    /**
     * update user
     *
     * @param User $user
     * @return self
     */
    public function updateAdmin(Admin $admin)
    {
        $updatedb = $this->_db->prepare('UPDATE user SET verifConnect = :verifConnect WHERE id = :id');
        $updatedb->bindValue(':id', $admin->getId(), PDO::PARAM_INT);
        $updatedb->bindValue(':verifConnect', $admin->getVerifConnect(), PDO::PARAM_INT);
        $updatedb->execute();
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
   * Get all users. It returns an array of objects $user
   *
   * @return array $arrayUsers
   */
  public function getAdmins() 
  {
    $query = $this->getDb()->query('SELECT * FROM admins');
    // $query = $this->_db->query('SELECT * FROM users');
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    // A chaque tour, on instancie un nouvel objet User qu'on stocke dans $arrayOfUsers[]
    foreach ($admins as $admin) {
      $arrayOfAdmins[] = new Admin($admin);
    }
    // On renvoie le tableau contenant tous nos objets User
    return $arrayOfAdmins;
  }

  /**
   * Add user in DB
   *
   * @param User $user
   */
  public function addAdmin(Admin $admin)
  {
    $query = $this->getDb()->prepare('INSERT INTO admins(name) VALUES(:name)');
    // $query->execute([
    //   'pseudo' => $user->getPseudo()
    // ]);
    $query->bindValue(':name', $user->getName(), PDO::PARAM_STR);

    $query->execute();
  }

}


 ?>
