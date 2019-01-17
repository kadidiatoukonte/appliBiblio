<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Book
 */
class BookManager
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
	public function add(Book $book)
	{
		$query = $this->getDb()->prepare('INSERT INTO books(title, description, author, release_date, available, categorie_id, image_id, user_id) VALUES (:title, :description, :author, :release_date, :available, :categorie_id, :image_id, :user_id)');
        $query->bindValue("title", $book->getTitle(), PDO::PARAM_STR);
        $query->bindValue("description", $book->getDescription(), PDO::PARAM_STR);
        $query->bindValue("author", $book->getAuthor(), PDO::PARAM_STR);
        $query->bindValue("release_date", $book->getRelease_date(), PDO::PARAM_STR);
        $query->bindValue("available", $book->getAvailable(), PDO::PARAM_INT);
        $query->bindValue("categorie_id", $book->getCategorie_id(), PDO::PARAM_INT);
        $query->bindValue("image_id", $book->getImage_id(), PDO::PARAM_INT);
        $query->bindValue("user_id", $book->getUser_id(), PDO::PARAM_INT);
		$query->execute();
	}

	/**
	 * Get all books
	 *
	 */
	public function getBooks()
	{

		$array['books'] = [];
		$array['images'] = [];
		$arrayOfAll = [];
		$query = $this->getDb()->prepare('SELECT * FROM books');
		$query->execute();
		// On récupère un tableau contenant plusieurs tableaux associatifs
		$dataBooks = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach ($dataBooks as $dataBook) 
		{
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfBooks
			$array['books'] = new Book($dataBook);
			$array['images'] = new Image($dataBook);
			
			$arrayOfAll[] = $array;
		
		}
        return $arrayOfAll;
	}

	/**
	 * Get an book by id
	 *
	 * @param integer $id
	 * @return Book
	 */
	public function getBook(int $id)
	{
		$id = (int) $id;
		$query = $this->getDb()->prepare('SELECT * FROM books WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);
		$query->execute();

		$dataBook = $query->fetch(PDO::FETCH_ASSOC);
		return new Book($dataBook);
	}

	/**
	 * Update book
	 *
	 * @param Book $book
	 */
	public function update(Books $book)
	{
		$query = $this->getDb()->prepare('UPDATE books SET title = :title, author = :author, release_date = :release_date, description = :description, image_id = :image, categorie_id = :categorie WHERE id = :bookid');
		$query->bindValue(':title', $book->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':author', $book->getAuthor(), PDO::PARAM_STR);
        $query->bindValue(':release_date', $book->getRelease_date(), PDO::PARAM_STR);
        $query->bindValue(':description', $book->getDescription(), PDO::PARAM_STR);
        $query->bindValue(':image', $book->getImage_id(), PDO::PARAM_INT);
        $query->bindValue(':categorie', $book->getCategorie_id(), PDO::PARAM_INT);
        $query->bindValue(':bookid', $book->getId(), PDO::PARAM_INT);
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
