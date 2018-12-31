<?php
//   include("includes/header.php"); 
  ?>
  <header class="flex header">
		<a href="index.php" class="margin-right">Bienvenue sur mon application bibliothèque</a>
        <a href="login.php">Connexion</a>
	</header>

	<h1>Mon application bibliothèque</h1>
  <?php if (empty($_SESSION['name'])) {
      ?>
<div class="container login-container">
    
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h2>Connection</h2>
                    <form action="login.php?connection=true" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre Pseudo *" name="nickname" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Votre mot de passe *" name="password" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Connection" />
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h2>Inscription</h2>
                    <form action="login.php?inscription=true" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre Pseudo *" name="nickname" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Votre mot de passe *" name="password" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirmation de votre mot de passe *" name="confirmpassword" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Inscription" />
                        </div>
                    </form>
                </div>
            </div>
        <?php
  } else {
      header('location: index.php');
  }?>
<?php
//   include("includes/footer.php");