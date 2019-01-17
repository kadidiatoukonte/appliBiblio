<?php
  include("template/header.php"); 
  ?>
<body>

<p>Welcome to my <strong> library</strong> application</p>
<p>If you do not have an account, please see <strong> <a href="signup.php"> subscribe</a></strong></p>

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="../images/user.png" alt="Admin" class="avatar">
  </div>

  <div class="container">
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
    <label for="mdp"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="mdp" required> 
  </div>

  
  <div class="container" style="background-color:#f1f1f1">  
    <button type="submit" name="login">Login</button>
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
</form>

</body>

<?php
  include("template/footer.php");