<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Book
 */
class DetailBookManager
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
	 * Add book to the database
	 *
	 * @param Book $book
	 */
	public function add(DetailBook $detailBook)
	{
		$query = $this->getDb()->prepare('INSERT INTO books(name, balance) VALUES (:name, :balance)');
		$query->bindValue("name", $detailBook->getName(), PDO::PARAM_STR);
		$query->bindValue("balance", $detailBook->getBalance(), PDO::PARAM_INT);
		$query->execute();
	}

	/**
	 * Get all books
	 *
	 */
	public function getDetailBooks()
	{

		$arrayOfAccounts = [];
		$query = $this->getDb()->query('SELECT * FROM books');

		// On récupère un tableau contenant plusieurs tableaux associatifs
		$dataDetailBooks = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach ($dataDetailBooks as $dataDetailBook) 
		{
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfBooks
			$arrayOfDetailBooks[] = new DetailBook($dataDetailBook);
		}
		return $arrayOfDetailBooks;
	}

	/**
	 * Get an book by id
	 *
	 * @param integer $id
	 * @return Book
	 */
	public function getDetailBook(int $id)
	{
		$id = (int) $id;
		$query = $this->getDb()->prepare('SELECT * FROM books WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);
		$query->execute();

		$dataDetailBook = $query->fetch(PDO::FETCH_ASSOC);
		return new DetailBook($dataDetailBook);
	}

	/**
	 * Update book
	 *
	 * @param Book $book
	 */
	public function update(DetailBook $detailBook)
	{
		$query = $this->getDb()->prepare('UPDATE books SET balance = :balance WHERE id = :id');
		$query->bindValue("balance", $detailBook->getBalance(), PDO::PARAM_INT);
		$query->bindValue("id", $detailBook->getId(), PDO::PARAM_INT);
		$query->execute();
	}

	/**
	 * Delete book
	 *
	 * @param integer $id
	 */
	public function delete(int $id)
	{
		$query = $this->getDb()->prepare('DELETE FROM books WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);		
		$query->execute();
	}
}
