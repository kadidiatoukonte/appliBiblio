<?php
  include("template/header.php");
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/main.css">
<body id="myPage">


<!-- <!DOCTYPE html>
<html>
<title>Ma Bibliothèque</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->

<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">   
    <img src="../images/biblio.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Ma Bibliothèque</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="indexView.php" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Accueil</a>
		<a href="userView.php" class="w3-bar-item w3-button w3-padding w3-text-teal">Users</a>
		<form class="w3-margin-top" action="index.php" method="post">
			<input class="w3-bar-item w3-button w3-padding" type="submit" name="logout" value="Me déconnecter">
		</form>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div id="navbarNavDropdown">
	  <ul>
      <li class="nav-item dropdown" style="list-style: none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="fas fa-bars"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Accueil</a>
          <a class="dropdown-item" href="#">Users</a>
          <a class="dropdown-item" href="#">Me deconnecter</a>
        </div>
      </li>
    </ul>
  </div>	
</nav>

<div class="text-center">
  <h1 class="text-center">Detail du livre</h1>
    <form class="text-center" action="" method="get">
      <button onclick="document.getElementById('addBook').style.display='block'" class="w3-button w3-black">Ajouter un livre</button>
					

					<div id="addBook" class="w3-modal">
						<div class="w3-modal-content">
							<span onclick="document.getElementById('addBook').style.display='none'"
							class="w3-button w3-display-topright">&times;</span>
							<h3 class="w3-center">Ajouter un livre</h3>
							<form class="w3-container w3-section" action="" method="post">
							  <label for="title">Titre du livre</l>
								<input id="title" class="w3-input w3-border w3-margin-bottom" type="text" name="title" value="" required>
								<label for="author">Auteur</label>
								<input id="author" class="w3-input w3-border w3-margin-bottom" type="text" name="author" value="" required>
								<label for="date">Date de parution</label>
								<input id="date" class="w3-input w3-border w3-margin-bottom" type="date" name="date" value="" required>
								<label for="resume">Résumé du livre</label>
								<textarea id="resume" class="w3-input w3-border w3-margin-bottom" type="text" name="resume" value="" required></textarea>
								<label for="image">Ajouter une image</label>
								<input id="image" class="w3-input w3-margin-bottom" type="file" name="file" value="Sélectionner une image">
								<input class="w3-input w3-margin-bottom w3-grey" type="submit" name="addBook" value="Ajouter le livre">
							</form>
						</div>
					</div>
    </form>

    <div class="w3-row w3-margin-top">
			<p>État: </p>
		</div>

		<div class="w3-row">
			<img src="img/mco-carton.png" alt="" class="w3-col m4">
			<p class="w3-col m8"><b>Titre :</b> <br></p>
			<p class="w3-col m8"><b>Auteur :</b> <br></p>
			<p class="w3-col m8"><b>Date de parution :</b> <br></p>
			<p class="w3-col m8"><b>Résumé :</b> <br></p>
		</div>

		<div class="w3-row text-center">
			<div class="w3-padding-16 w3-section w3-row">
				<button onclick="document.getElementById('editBook').style.display='block'" class="m2 l2 w3-button w3-black">Modifier</button>
				<form class="w3-col m1 w3-margin-left" action="" method="post">
					<input type="hidden" name="id" value="">
					<input type="submit" name="delete" value="Supprimer le livre" class="w3-button w3-red">
				</form>
			</div>

			<div id="editBook" class="w3-modal">
				<div class="w3-modal-content">
					<span onclick="document.getElementById('editBook').style.display='none'"
					class="w3-button w3-display-topright">&times;</span>
					<h3 class="w3-center">Modifier les informations</h3>
					<form class="w3-container w3-section" action="" method="post">
						<label for="title">Titre du livre</label>
						<input id="title" class="w3-input w3-border w3-margin-bottom" type="text" name="title" value="" required>
						<label for="author">Auteur</label>
						<input id="author" class="w3-input w3-border w3-margin-bottom" type="text" name="author" value="" required>
						<label for="date">Date de parution</label>
						<input id="date" class="w3-input w3-border w3-margin-bottom" type="date" name="date" value="" required>
						<label for="resume">Résumé du livre</label>
						<textarea id="resume" class="w3-input w3-border w3-margin-bottom" type="text" name="resume" value="" required></textarea>
						<label for="image">Ajouter une image</label>
						<input id="image" class="w3-input w3-margin-bottom" type="file" name="file" value="Sélectionner une image">
						<input type="hidden" name="id" value="">
						<input class="w3-input w3-margin-bottom w3-grey" type="submit" name="addBook" value="Enregistrer">
					</form>
				</div>
			</div>
    <div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>
</html>


<?php
  include("template/footer.php");