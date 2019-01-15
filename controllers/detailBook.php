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
$detailBookManager = new DetailBookManager($db);



// Si le formulaire de création de compte est soumis
if(isset($_POST['new'])){

	// Si le champ name est bien rempli, et n'est pas vide
	if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['author']) && isset($_POST['release_date']) && isset($_POST['available']) && isset($_POST['categorie_id']) && isset($_POST['image_id']) && isset($_POST['user_id']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['author']) && !empty($_POST['release_date']) && !empty($_POST['available']) && !empty($_POST['categorie_id']) && !empty($_POST['image_id']) && !empty($_POST['user_id'])){

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $author = htmlspecialchars($_POST['author']);
        $release_date = htmlspecialchars($_POST['release_date']);
        $available = htmlspecialchars($_POST['available']);
        $categorie_id = htmlspecialchars($_POST['categorie_id']);
        $image_id = htmlspecialchars($_POST['image_id']);
        $user_id = htmlspecialchars($_POST['user_id']);



		// Si le nom envoyé correspond aux noms autorisés dans la classe Account
		// if (in_array($name, Categorie::CATEGORIES)){

			// On instancie un objet $account
			// $book = new Book([
			// 	'name' => $name,
			// ]);

			// On enregistre l'objet $account dans la base de données
			$detailBookManager->add($detailBook);

		} 
		// Si le nom ne correspond pas aux noms autorisés dans la classe, on déclare un message d'erreur
		else {
			$error_message = "erreur";
		}

	} 
	// Si le champ name est vide ou n'existe pas, on déclare un message d'erreur
	else {
		$error_message = "Veuillez renseigner le champ";
	}




// Si c'est le formulaire de suppression qui est soumis
if(isset($_POST['delete'])){

	if(isset($_POST['id']) && !empty($_POST['id'])){

		$id = (int) $_POST['id'];

		// On le supprime en BDD
		$detailBookManager->delete($id);
	}
	else {
		$error_message = "Veuillez choisir un livre à supprimer";
	}

}



// La variable $authorizedAccounts nous sert à lister les comptes possibles à créer dans notre vue
// $authorizedAccounts est un tableau sur lequel on bouclera
// $authorizedAccounts = Account::ACCOUNTS;

// On récupère tous les comptes dans la BDD
// $accounts est un tableau contenant tous les objets comptes présents en DB
$detailBooks = $detailBookManager->getDetailBooks();

// Enfin, on inclut la vue
include "../views/detailBookView.php";
