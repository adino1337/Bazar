<?php 
    $inzerat_id = $_GET['id'];
    include 'header.php';
    $obrazky = array();
    $select = "SELECT * FROM inzerat WHERE id = '$inzerat_id'";            
    $results = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($results);
    $hlavny_obrazok = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM photos WHERE inzerat_id = '$inzerat_id' and hlavny_obrazok = 1"));
    $photosSelect = "SELECT * FROM photos WHERE inzerat_id = '$inzerat_id' and hlavny_obrazok != 1";
    $photoResults = mysqli_query($conn, $photosSelect);
    while($photoRow = mysqli_fetch_assoc($photoResults)){
        $obrazky[] = $photoRow['path'];
    }

?>

<div class="subpage">
<img src="blobs/bottom-right.svg" alt="" style="bottom: 0; right: 0;" class="line"> 
            <h2><?php echo $row['titulok']; ?></h2>
            <div class="inzeratIMG">       
                <div class="mainIMG">         
                <a class="example-image-link lightboxA" href="<?php echo $hlavny_obrazok['path'] ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="<?php echo $hlavny_obrazok['path'] ?>" alt=""/></a>
                </div>
                <div class="others">
                <?php foreach($obrazky as $obrazok){ ?>                
                <a class="example-image-link" href="<?php echo "$obrazok" ?>" data-lightbox="example-set" data-title=""><img class="example-image" src="<?php echo "$obrazok" ?>" alt="" /></a>

            <?php } ?>
                </div>
            </div>
            <div class="cardText">  
                <div class="background"> 
                    <p><?php echo $row['datum_vytvorenia']?></p>   <br>     
        <p><?php echo $row['popis'] ?></p>
        <h4><?php echo $row['mesto']." | ".$row['psc']; ?></h4>
        <h1><span style="font-size: 16px; margin-right:10px;">€</span><?php if($row['typ'] == 'Predám') echo $row['cena']; else echo "Zadarmo"?></h1>
        <button class="login_btn" style="width: 100px;">Contact</button>
        </div>
    </div>         
        </div>
                
<?php include 'footer.php' ?>