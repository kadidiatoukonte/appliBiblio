<?php
   include('../controllers/userDetail.php')
?>
<!DOCTYPE html>
<html>
<title>Ma Bibliothèque</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="img/user.png" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Ma Bibliothèque</b></h4>
  </div>
  <div class="w3-bar-block">
		<a href="home.html" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Livres</a>
		<form class="w3-margin-top" action="index.html" method="post">
			<input class="w3-bar-item w3-button w3-padding" type="submit" name="logout" value="Me déconnecter">
		</form>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

		<div class="w3-container">
			<!-- Header -->
		  <div>
		    <a href="#"><img src="img/user.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
		    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
		    <div class="w3-container">
			    <h1 class="w3-center"><b>Les utilisateurs</b></h1>

					<div class="w3-bottombar w3-padding-16 w3-section">
						<!-- MODAL AJOUT BOOK -->
						<button onclick="document.getElementById('addUser').style.display='block'" class="w3-button w3-black">Ajouter un utilisateur</button>
					</div>

					<div id="addUser" class="w3-modal">
						<div class="w3-modal-content">
							<span onclick="document.getElementById('addUser').style.display='none'"
							class="w3-button w3-display-topright">&times;</span>
							<h3 class="w3-center">Ajouter un utilisateur</h3>
							<form class="w3-container w3-section" action="" method="post">
								<label for="last_name">Nom</label>
								<input id="last_name" class="w3-input w3-border w3-margin-bottom" type="text" name="last_name" value="" required>
								<label for="first_name">Prénom</label>
								<input id="first_name" class="w3-input w3-border w3-margin-bottom" type="text" name="first_name" value="" required>
								<input class="w3-input w3-margin-bottom w3-grey" type="submit" name="addUser" value="Ajouter l'utilisateur">
							</form>
						</div>
					</div>

					<div class="w3-container w3-row">
				 				<h2>Détails de l'utilisateur</h2>

								<a href="home.html" class="w3-button w3-black">Retour</a>

								<div class="w3-row">
									<p class="w3-col"><b>Nom :</b> <br>Dupont</p>
									<p class="w3-col"><b>Prénom :</b> <br>Toto</p>
									<p class="w3-col"><b>Identifiant :</b> <br>1234567890</p>
									<p class="w3-col"><b>Nombre d'emprunts :</b> <br>2</p>
									<p class="w3-col"><b>Livres empruntés :</b> <br>Barbie OUI-OUI Où est charlie</p>
								</div>
					</div>
				</div>

		  </div>


			<div class="w3-row">
				<div class=" w3-padding-16 w3-section w3-row">
					<!-- MODAL EDIT USER -->
					<button onclick="document.getElementById('editUser').style.display='block'" class="w3-col m2 l2 w3-button w3-black">Modifier</button>
					<form class="w3-col m1 w3-margin-left" action="" method="post">
						<input type="hidden" name="id" value="">
						<input type="submit" name="delete" value="Supprimer l'utilisateur" class="w3-button w3-red">
					</form>
				</div>

				<div id="editUser" class="w3-modal">
					<div class="w3-modal-content">
						<span onclick="document.getElementById('editUser').style.display='none'"
						class="w3-button w3-display-topright">&times;</span>
						<h3 class="w3-center">Modifier les informations</h3>
						<form class="w3-container w3-section" action="" method="post">
							<label for="last_name">Nom</label>
							<input id="last_name" class="w3-input w3-border w3-margin-bottom" type="text" name="last_name" value="" required>
							<label for="first_name">Prénom</label>
							<input id="first_name" class="w3-input w3-border w3-margin-bottom" type="text" name="first_name" value="" required>
							<input class="w3-input w3-margin-bottom w3-grey" type="submit" name="addUser" value="Enregistrer">
						</form>
					</div>
				</div>
			</div>

		</div>


</div>

<script type="text/javascript" src="js/main.js"></script>

</body>
</html>

<?php
  include("template/footer.php");
