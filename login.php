<?php 
if (!isset($_SESSION))
{
  session_start();  
}
    
    
    include 'config.php';
    
    $errors = array();

    if(isset($_GET['logout'])){
        session_destroy();
        header('location:index.php');
    }

    if(isset($_POST['loginBTN']))
    {
        $login = mysqli_escape_string($conn, $_POST['nameL']);
        $heslo = mysqli_escape_string($conn, $_POST['passwordL']);

        $select = mysqli_query($conn, "SELECT * FROM user WHERE login = '$login' AND pass = '$heslo'");

        if(mysqli_num_rows($select) > 0)
        {
            $row = mysqli_fetch_assoc($select);
            $_SESSION['username'] =  $row['name']." ".$row['surname'];
            $_SESSION['user_id'] = $row['id'];       
            header('location:index.php');
        }
        else
            $errors[] = "Wrong login or password";



    }

    if(isset($_POST['registrationBTN'])){
        $meno = mysqli_real_escape_string($conn, $_POST['menoR']);
        $priezvisko = mysqli_real_escape_string($conn, $_POST['priezviskoR']);
        $email = mysqli_real_escape_string($conn, $_POST['emailR']);
        $login = mysqli_real_escape_string($conn, $_POST['loginR']);
        $heslo = mysqli_real_escape_string($conn, $_POST['hesloR']);
        $heslo2 = mysqli_real_escape_string($conn, $_POST['hesloR2']);

        $select = mysqli_query($conn, "SELECT * FROM user WHERE login = '$login'");

        if(mysqli_num_rows($select) > 0)
            $errors[] = 'user already exist';

        if(!preg_match('@[A-Z]@', $heslo) || !preg_match('@[a-z]@', $heslo) || !preg_match('@[0-9]@', $heslo) || strlen($heslo) < 8)
            $errors[] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number.';        
        
        if($heslo != $heslo2)
            $errors[] = 'passwords do not match';

        if(count($errors) == 0){
            $insert = mysqli_query($conn, "INSERT INTO user (login, pass, name, surname, email) VALUES('$login','$heslo','$meno','$priezvisko','$email')");
            if($insert){                  
                $_SESSION['username'] =  $_POST['menoR']." ".$_POST['priezviskoR'];     
                $_SESSION['user_id'] = mysqli_insert_id($conn);    
                header('location:index.php');
            }
        }        
    }
?>
