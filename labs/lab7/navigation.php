<nav>
    <ul>
<?php 
    
    if (isset($_SESSION['user_id'])) {
      echo '<li> <a href="index.php"> Home </a> </li> '; 
      echo '<li> <a href="profile.php"> Profile </a> </li> '; 
      echo '<li> <a href="memes.php">Memes</a></li>'; 
      echo '<li> <a href="logout.php">Logout</a></li>'; 
    }
    else  
      echo '<li> <a href="login.php">Login</a></li>'; 
    
?>
</ul>
<div class="clear"></div>
</nav>