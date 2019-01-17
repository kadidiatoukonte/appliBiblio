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



// Si le formulaire de création de compte est soumis
if(isset($_POST['new']))
{
	if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['author']) && isset($_POST['release_date']) && isset($_POST['available']) && isset($_POST['categorie_id']) && isset($_POST['image_id']) && isset($_POST['user_id']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['author']) && !empty($_POST['release_date']) && !empty($_POST['available']) && !empty($_POST['categorie_id']) && !empty($_POST['image_id']) && !empty($_POST['user_id'])){

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
		$author = htmlspecialchars($_POST['author']);
        $release_date = htmlspecialchars($_POST['release_date']);
        $available = htmlspecialchars($_POST['available']);
        $categorie_id = htmlspecialchars($_POST['categorie_id']);
        $image_id = htmlspecialchars($_POST['image_id']);
        $user_id = htmlspecialchars($_POST['user_id']);

			$bookManager->add($book);

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

		$bookManager->delete($id);
	}
	else {
		$error_message = "Veuillez choisir un livre à supprimer";
	}

}
$books = $bookManager->getBooks();

// Enfin, on inclut la vue
include "../views/bookView.php";
