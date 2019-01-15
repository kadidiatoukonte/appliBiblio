<?php
     include('../controllers/detailBook.php');
 ?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body id="myPage">

<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-small" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
    <i class="fa fa-remove"></i>
  </a>
  <form class="w3-container w3-section" action="" method="post">
					<label for="title">Title</label>
					<input id="title" class="w3-input w3-border w3-margin-bottom" type="text" name="title" value="" required>
					<label for="author">Author</label>
					<input id="author" class="w3-input w3-border w3-margin-bottom" type="text" name="author" value="" required>
					<label for="date">Release date</label>
					<input id="date" class="w3-input w3-border w3-margin-bottom" type="date" name="date" value="" required>
					<label for="resume">Description</label>
					<textarea id="resume" class="w3-input w3-border w3-margin-bottom" type="text" name="resume" value="" required></textarea>
					<label for="image">Add image</label>
					<input id="image" class="w3-input w3-margin-bottom" type="file" name="file" value="Sélectionner une image">
					<input class="w3-input w3-margin-bottom w3-grey" type="submit" name="addBook" value="Add book">
				</form>
</nav>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="#team" class="w3-bar-item w3-button">Accueil</a>
    <a href="#work" class="w3-bar-item w3-button">User</a>
    <a href="#contact" class="w3-bar-item w3-button">Me deconnecter</a>
    <a href="#" class="w3-bar-item w3-button">Search</a>
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="../images/biblio.jpg" alt="bibliothèque" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomright w3-margin-bottom" style="right:0 !important; margin-right: 11em !important;">  
    <!-- <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">LEARN W3.CSS</button> -->
    <!-- <nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br> -->
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <!-- <img src="img/user.png" style="width:45%;" class="w3-round"><br><br> -->
    <h4><b>Ma Bibliothèque</b></h4>
  </div>
  <div class="w3-bar-block">
		<button onclick="accordion('books','users')" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Accueil</button>
		<button onclick="accordion('users','books')" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>User</button>
		<form class="w3-margin-top" action="index.html" method="post">
			<input class="w3-bar-item w3-button w3-padding" type="submit" name="logout" value="Me déconnecter">
		</form>
  </div>
<!-- </nav> -->
  </div>
</div>


<!-- header2 -->

<div>
    <a href="#"><img src="img/user.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1 class="w3-center"><b>Détails du livre</b></h1>

  </div>
  </div>
<!-- <body class="w3-light-grey w3-content" style="max-width:1600px"> -->

<!-- Sidebar/menu
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

 Overlay effect when opening sidebar on small screens -->
<!-- <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div> -->

<!-- !PAGE CONTENT! -->
<!-- <div class="w3-main" style="margin-left:300px">

	<div id="books" class="w3-container" style="display: block"> -->

  <!-- Header -->
  <!-- <div>
    <a href="#"><img src="img/user.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1 class="w3-center"><b>Ma Bibliothèque</b></h1> -->

		

		
    </div>

  </div>

	<div class="w3-container w3-row">
	  

		<!-- <a href="home.html" class="w3-button w3-black">Retour</a> -->

		<div class="w3-row w3-margin-top">
			<p>État: Disponible / Emprunté par Mr Blabla</p>
		</div>

		<div class="w3-row">
			<img src="img/mco-carton.png" alt="" class="w3-col m4">
			<p class="w3-col m8"><b>Titre :</b> <br>azertyuiopmlkjhgf</p>
			<p class="w3-col m8"><b>Auteur :</b> <br>Toto</p>
			<p class="w3-col m8"><b>Date de parution :</b> <br>15 janvier 1986</p>
			<p class="w3-col m8"><b>Genre :</b> <br>Fantastique</p>
			<p class="w3-col m8"><b>Résumé :</b> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

		<div class="w3-row">
			<div class=" w3-padding-16 w3-section w3-row">
				<!-- MODAL AJOUT BOOK -->
				<button onclick="document.getElementById('editBook').style.display='block'" class="w3-col m2 l2 w3-button w3-black">Modifier</button>
				<form class="w3-col m1 w3-margin-left" action="" method="post">
					<input type="hidden" name="id" value="">
					<input type="submit" name="delete" value="Supprimer le livre" class="w3-button w3-red">
                    <div class="w3-padding-16 w3-section">
			            <button onclick="document.getElementById('addBook').style.display='block'" class="w3-button w3-black">Ajouter un livre</button>
		            </div>
                    <div id="addBook" class="w3-modal">
                        <div class="w3-modal-content">
                            <span onclick="document.getElementById('addBook').style.display='none'"class="w3-button w3-display-topright">&times;</span>
                            <h3 class="w3-center">Ajouter un livre</h3>
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
                                <input class="w3-input w3-margin-bottom w3-grey" type="submit" name="addBook" value="Ajouter le livre">
                            </form>
                        </div>
		            </div>
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
		</div>




	</div>





		</div>


    </div>

<script type="text/javascript" src="js/main.js"></script>

<?php
  include("template/footer.php");