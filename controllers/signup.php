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
$adminManager = new AdminManager($db);



// Si le formulaire de création de compte est soumis
if(isset($_POST['new'])){

	// Si le champ name est bien rempli, et n'est pas vide
	if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['mdp']) && !empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['mdp'])){

        $name = htmlspecialchars($_POST['name']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['mdp']);


			// On enregistre l'objet $account dans la base de données
			$adminManager->add($admin);

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

// On récupère tous les comptes dans la BDD
// $accounts est un tableau contenant tous les objets comptes présents en DB
$admins = $adminManager->getAdmins();

// Enfin, on inclut la vue
include "../views/signupView.php";
