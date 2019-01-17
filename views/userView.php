<?php
  include("template/header.php");
?>


<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">   
    <img src="../images/biblio.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Ma Bibliothèque</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Accueil</a>
		<a href="detailBook.php" class="w3-bar-item w3-button w3-padding w3-text-teal">Books</a>
		<form class="w3-margin-top" action="login.php" method="post">
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
          <a class="dropdown-item" href="index.php">Accueil</a>
          <a class="dropdown-item" href="book.php">Books</a>
          <a class="dropdown-item" href="login.php">Me deconnecter</a>
        </div>
      </li>
    </ul>
  </div>	
</nav>

  <h1 class="text-center">Listes des utilisateurs</h1>
    <form class="text-center" action="" method="get">
      <button onclick="document.getElementById('addUser').style.display='block'" class="w3-button w3-black">Créer un utilisateur</button>
					

					<div id="addUser" class="w3-modal">
						<div class="w3-modal-content">
							<span onclick="document.getElementById('addUser').style.display='none'"
							class="w3-button w3-display-topright">&times;</span>
							<h3 class="w3-center">Créer un utilisateur</h3>
							<form class="w3-container w3-section" action="" method="post">
								<label for="lastname">LastName</label>
								<input id="lastname" class="w3-margin-bottom" type="text" name="lastname" value="" required>
								<label for="firstname">FirstName</label>
								<input id="firstname" class="w3-margin-bottom" type="text" name="firstname" value="" required>
								<input class="" type="submit" name="addUser" value="Créer l'utilisateur">
							</form>
						</div>
					</div>
    </form>

    <div class="col-12 row m-0 text-center">
      <div class="mt-3 border border-dark col-12 col-md-5 mx-auto">
        <a href="userDetailView.php">
          <div class="col-12 p-0 m-0">
            <p class="cardTitle text-center pt-2 blackText"></p>
            <p class="cardPrice text-center pb-2 mb-0 mt-2 blackText"></p>
            <p class="cardPrice text-center pb-2 mb-0 mt-2 blackText"></p>
          </div>
        </a>
        <form  class="mb-2 text-center" action="" method="post">
          <input class="btn btn-danger" type="submit" name="Detail" value="Detail"><br>
          <input class="btn btn-danger" type="submit" name="Delete" value="Delete">
          <input class="btn btn-danger" type="submit" name="Modifier" value="Modifier">
        </form>
      </div>
    <div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

<?php
  include("template/footer.php");