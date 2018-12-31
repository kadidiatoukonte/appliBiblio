<?php

function chargerClasse($classname)
{
    if(file_exists('../models/'. $classname.'.php'))
    {
        require '../models/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('chargerClasse');

// On instancie un manager pour nos users
// En argument, on lui passe l'objet PDO retourné par la méthode DB(), de la classe Database
$connexionManager = new ConnexionManager(Database::DB());

// On instancie la classe User pour créer un nouvel objet $newUser
// On passe en argument un tableau associatif
// L'objet n'est pas encore enregistré en base de données. Il existe uniquement dans notre code PHP
$newConnexion = new Connexion([
    "pseudo" => "Albert"
]);

// C'est notre manager qui se charge d'enregistrer notre nouvel objet $newUser en base de données
$connexionManager->addConnexion($newConnexion);

// On récupère tous les users de la base de données grâce à notre manager
// On les stocke dans la variable $users
$connexions = $connexionManager->getConnexions();

// On appelle enfin notre vue pour afficher nos users
include "../views/indexVue.php";
 ?>



include "../views/indexVue.php";
 ?>
