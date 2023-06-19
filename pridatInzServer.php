<?php 
    include 'config.php';
    $images = array();    

    

    if(isset($_POST['addSubmit'])){   
        $user_id = $_SESSION['user_id'];
        
        $titulok = mysqli_escape_string($conn, $_POST['nazov']);
        $popis = mysqli_escape_string($conn, $_POST['popis']);
        $typ = mysqli_escape_string($conn, $_POST['typ']);
        $cena = mysqli_escape_string($conn, $_POST['cena']);
        $psc = mysqli_escape_string($conn, $_POST['psc']);
        $mesto = mysqli_escape_string($conn, $_POST['mesto']);
        $datum = "current_timestamp()";
        $insert = "INSERT INTO inzerat(titulok,popis,psc,mesto,datum_vytvorenia,cena,typ,user_id) VALUES ('$titulok','$popis','$psc','$mesto',$datum,$cena,'$typ',$user_id)";

        mysqli_query($conn, $insert);

        $inzerat_id = mysqli_insert_id($conn);

        $hlavny_img_name = $_FILES['hlIMG']['name'];
        $hlavny_img_size = $_FILES['hlIMG']['size'];
        $hlavny_img_tmp_name = $_FILES['hlIMG']['tmp_name'];
        $image_folder = 'obrazky/foto_inzeraty/custom/'.uniqid().$hlavny_img_name;
        move_uploaded_file($hlavny_img_tmp_name, $image_folder);
        mysqli_query($conn, "INSERT INTO photos(path,hlavny_obrazok,inzerat_id) VALUES ('$image_folder',1,$inzerat_id)");
        
        
        if(file_exists($_FILES['IMG1']['tmp_name'])){
            $images[] = $_FILES['IMG1'];
        }
        if(file_exists($_FILES['IMG2']['tmp_name'])){
            $images[] = $_FILES['IMG2'];
        }
        if(file_exists($_FILES['IMG3']['tmp_name'])){
            $images[] = $_FILES['IMG3'];
        }
        
        foreach($images as $image){            
            $image_name = $image['name'];
            $image_size = $image['size'];
            $image_tmp_name = $image['tmp_name'];
            $image_folder = 'obrazky/foto_inzeraty/custom/'.uniqid().$image_name;
            move_uploaded_file($image_tmp_name, $image_folder);
            mysqli_query($conn, "INSERT INTO photos(path,hlavny_obrazok,inzerat_id) VALUES ('$image_folder',0,$inzerat_id)");
            
        }
    }
?>