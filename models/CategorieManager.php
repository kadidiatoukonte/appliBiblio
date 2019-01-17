<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Categorie
 */
class CategorieManager
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
	 * Add categorie to the database
	 *
	 * @param Categorie $categorie
	 */
	public function add(Categorie $categorie)
	{
		$query = $this->getDb()->prepare('INSERT INTO categories(name) VALUES (:name)');
		$query->bindValue("name", $categorie->getName(), PDO::PARAM_STR);
		$query->execute();
	}

	/**
	 * Get all categories
	 *
	 */
	public function getCategories()
	{

		$arrayOfCategories = [];
		$query = $this->getDb()->prepare('SELECT *
										FROM books
										INNER JOIN categories
										ON books.categorie_id = categorie.idCategorie');
		$query->execute();
		// On récupère un tableau contenant plusieurs tableaux associatifs
		$dataCategories = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($dataCategories as $dataCategorie) 
		{
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfCategories
			$arrayOfCategories[] = new Categorie($dataCategorie);
		}
		return $arrayOfCategories;
	}

	/**
	 * Get an categorie by id
	 *
	 * @param integer $id
	 * @return Categorie
	 */
	public function getCategorie(int $idCategorie)
	{
		$idCategorie = (int) $idCategorie;
		$query = $this->getDb()->prepare('SELECT * FROM categories WHERE idCategorie = :idCategorie');
		$query->bindValue("idCategorie", $idCategorie, PDO::PARAM_INT);
		$query->execute();

		$dataCategorie = $query->fetch(PDO::FETCH_ASSOC);
		return new Categorie($dataCategorie);
	}

	/**
	 * Update categorie
	 *
	 * @param Categorie $categorie
	 */
	public function update(Categorie $categorie)
	{
		$query = $this->getDb()->prepare('UPDATE categories SET name = :name WHERE id = :id');
		$query->bindValue("name", $categorie->getName(), PDO::PARAM_INT);
		$query->bindValue("id", $categorie->getId(), PDO::PARAM_INT);
		$query->execute();
	}

	/**
	 * Delete categorie
	 *
	 * @param integer $id
	 */
	public function delete(int $id)
	{
		$query = $this->getDb()->prepare('DELETE FROM categories WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);		
		$query->execute();
	}

	public function getLastCategorie(){
		$query = $this->getDb()->query('SELECT * FROM categories ORDER BY categorie_id DESC LIMIT 1');
		$categorieLast = $query->fetch(PDO::FETCH_ASSOC);
		$objetCategorie = new categorie($categorieLast);
		return $objetCategorie;
	}
}
