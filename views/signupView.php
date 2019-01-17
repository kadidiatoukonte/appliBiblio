<?php
  include("template/header.php"); 
  ?>
<body>

<form action="signup.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <hr>

    <label for="name"><b>FirstName</b></label>
    <input type="text" placeholder="Enter firstname" name="name" required>

    <label for="mail"><b>Email</b></label>
    <input type="mail" placeholder="Enter Email" name="mail" required>

    <label for="mdp"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="mdp" required>

    <label for="mdp-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="mdp-repeat" required>
    
    <div class="clearfix">
      <a href="login.php"><button type="button" class="cancelbtn">Cancel</button></a>
      <button type="submit" name="signup" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>

<?php
  include("template/footer.php");