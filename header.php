<?php 
    include 'login.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="lightbox2/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/loginstyles.css">
    <link rel="stylesheet" href="assets/css/customRadio.css">
</head>
<body>



<div class="overlay" id="overlay"></div>
<div class="modal" id="modal">
    <form method="post" class="formular login activeLogin" id="loginForm">
      <div class="linksLogin">
    		<h2 class="activeLink">Login</h2>
    		<h2 id="signUP">Sign Up</h2>
    	</div>      	
      	<div class="input-group">
      		<label>Login</label>
      		<input type="text" name="nameL" >
      	</div>
      	<div class="input-group">
      		<label>Password</label>
      		<input type="password" name="passwordL">
      	</div>
      	<div class="input-group" style="display: flex; justify-content: center;">
      		<button class="login_btn" name="loginBTN">Submit</button>
      	</div>  	
      </form>

      <form method="post" class="formular login" id="regForm">
      <div class="linksLogin">
    		<h2 id="login">Login</h2>
    		<h2 class="activeLink">Sign Up</h2>
    	</div>     
        <div class="togetherInputs"> 	
        <div class="input-group">
  	  <label>Firstname</label>
  	  <input type="text" name="menoR">
  	</div>
      <div class="input-group">
  	  <label>Lastname</label>
  	  <input type="text" name="priezviskoR">
  	</div>
      </div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="emailR">
  	</div>
      <div class="input-group">
  	  <label>Login</label>
  	  <input type="text" name="loginR">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="hesloR">
  	</div>
  	<div class="input-group">
  	  <label>Confirm Password</label>
  	  <input type="password" name="hesloR2">
  	</div>
  	<div class="input-group" style="display: flex; justify-content: center;">
  	  <button type="submit" class="login_btn" name="registrationBTN">Submit</button>
  	</div> 	
      </form>
    </div>
    
    
    <?php 
        if(!isset($active))
            $active = "none";

        if(count($errors) > 0)
            {
                echo "<div class='errors'>";
                foreach($errors as $error){
                    echo $error,"<br>";
                }
                echo "</div>";
            }
    ?>        
        <div class="container" id="nav">
        <nav>
            <a href="index.php" style="color: #04c582;"><h1>@BAZÁR</h1></a>
            <div class="links">
                <a href="index.php" <?php if($active == "uvod") echo "class='activeNAV'";?> >Úvodná stránka</a>
                <a href="podmienky.php" <?php if($active == "podmienky") echo "class='activeNAV'";?>>Podmienky použitia</a>
                <?php 
                    if(isset($_SESSION['username'])){
                        if($active == "add") 
                            echo '<a href="pridatInzerat.php" class="activeNAV">Pridať inzerát</a>';
                        else
                            echo '<a href="pridatInzerat.php">Pridať inzerát</a>';
                    }
                ?>                
            </div>
            <?php 
            if(!isset($_SESSION['username'])){ 
            ?>
            <button data-modal-target="#modal" class="login_btn" style="width: 100px; margin: 0;">LOGIN</button>
                        
            <?php
            }
            else{ 
                echo "<div class='logged'>";
                echo "<p>",$_SESSION['username'],"</p>";
                echo '<a href="login.php?logout" style="text-align: center;"><button class="login_btn">Log Out</button></a>';
                echo "</div>";
            }
            ?>
            
        </nav>
        <div class="darkMode">
        <input type="checkbox" id="darkMode" checked>
        <span class="darkModeIcon"></span>                
        </div>
        </div>
        
</body>
</html>