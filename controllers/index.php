<?php

// On enregistre notre autoload.
function chargerClasse($classname)
{
    if(file_exists('../models/'. $classname.'.php')){
        require '../models/'. $classname.'.php';
        
    }
    else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');

// Connexion à la base de données
$db = Database::DB();

// On instancie notre manager
$bookManager = new BookManager($db);
$imageManager = new ImageManager($db);
$categorieManager = new CategorieManager($db);

// Si le formulaire de création d'ajout de livres est soumis
if(isset($_POST['addBook']))
{
	
	if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['author']) && isset($_POST['release_date']) && isset($_POST['categorie']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['author']) && !empty($_POST['release_date']) && !empty($_POST['categorie'])){

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $author = htmlspecialchars($_POST['author']);
        $release_date = htmlspecialchars($_POST['release_date']);
        $categorie = htmlspecialchars($_POST['categorie']);
		
		$book = new Book([
			'title' => $title,
			'description' => $description,
			'author' => $author,
			'release_date' => $release_date
		]);

		$categorie = new Categorie([
			'name' => $categorie
		]);
		
		$image = new Image([
			'src' => $_FILES['file']['name'],
			'alt' => $_FILES['file']['name']
		]);

		var_dump($book);
		$bookManager->add($book);
		$imageManager->add($image);
		$categorieManager->add($categorie);
		

	} 
		else {
			$error_message = "erreur";
		}

} 
	else {
		$error_message = "Veuillez renseigner le champ";
	}


if(isset($_POST['delete']))
{

	if(isset($_POST['id']) && !empty($_POST['id'])){

		$id = (int) $_POST['id'];

		// On le supprime en BDD
		$bookManager->delete($id);
	}
	else {
		$error_message = "Veuillez choisir un livre à supprimer";
	}

}

$books = $bookManager->getBooks();
// $images = $imageManager->getLastImage();
// $categories = $bookManager->getLastCategorie();

// Enfin, on inclut la vue
include "../views/indexView.php";
