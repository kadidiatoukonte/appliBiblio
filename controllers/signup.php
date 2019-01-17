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
if(isset($_POST['signup'])){

	// Si le champ name est bien rempli, et n'est pas vide
	if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['mdp']) && !empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['mdp'])){
        $name = htmlspecialchars($_POST['name']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $pdoAdmin = new Admin([
			'name' => $name,
			'mdp' => $mdp,
			'mail' => $mail
		]);
		$getAdmin = $adminManager->getAdmin($name);
		if (!$getAdmin) {
			$adminManager->addAdmin($pdoAdmin);
		}
	}
}
// $admins = $adminManager->getAdmins();

// Enfin, on inclut la vue
include "../views/signupView.php";
