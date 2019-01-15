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
<link rel="stylesheet" href="../assets/css/main.css">
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
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a> -->
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="indexView.php" class="w3-bar-item w3-button">Accueil</a>
    <a href="bookView.php" class="w3-bar-item w3-button">Books</a>
    <a href="userView.php" class="w3-bar-item w3-button">Users</a>
    <a href="#" class="w3-bar-item w3-button">Me deconnecter</a>
    <!-- <a href="#" class="w3-bar-item w3-button">Search</a> -->
  </div>
</div>

<!-- Image Header -->

<div class="w3-display-container w3-animate-opacity">
  <img src="../images/biblio.jpg" alt="bibliothèque" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomright w3-margin-bottom" style="right:0 !important; margin-right: 11em !important;">
    <div class="w3-container">
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
        <i class="fa fa-remove"></i>
      </a>
      <h4><b>Ma Bibliothèque</b></h4>
    </div>
    <div class="w3-bar-block">
      <button onclick="accordion('books','users')" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Accueil</button>
      <a href="bookView.php">
      <a href="userView.php"><button onclick="accordion('users','books')" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Users</button></a>
      <form class="w3-margin-top" action="" method="post">
        <input class="w3-bar-item w3-button w3-padding" type="submit" name="logout" value="Me déconnecter">
      </form>
    </div>
  </div>
</div>


<!-- header2 -->
<!-- <div> -->
  <!-- <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span> -->
  <div class="w3-container">
    <h1 class="w3-center"><b>Ma Bibliothèque</b></h1>
  </div>
<!-- </div> -->

<!-- Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Oh snap! We just showed you a modal..</h4>
      <h5>Because we can <i class="fa fa-smile-o"></i></h5>
    </header>
    <div class="w3-container">
      <p>Cool huh? Ok, enough teasing around..</p>
      <p>Go to our <a class="w3-text-teal" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
    </div>
    <footer class="w3-container w3-teal">
      <p>Modal footer</p>
    </footer>
  </div>
</div>

<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">


<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<?php
  
  foreach ( $books as $book )
  {
?>
  <div class="w3-quarter">
    <a href="detailBook.php"><div class="w3-card w3-white">
      <img src="../images/bouquet.jpg" alt="bouquet" style="width:100%">
      <div class="w3-container">
        <h3> <?php echo $book->getTitle(); ?></h3>
      </div>
    </div></a>
  </div>
<?php      
  }
 ?> 


</div>

<!-- Container -->
  <?php 
    foreach ($books as $book)
    { ?>
      <div class="w3-container" style="position:relative">
        <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
        style="position:absolute;top:-28px;right:24px">+</a>
      </div>
  <?php
    }
  ?> 

</div>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>


 <?php
   include("template/footer.php");
  ?>
