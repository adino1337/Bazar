<?php 

include 'config.php';
$inzerat_id = $row['id'];
$select = "SELECT * FROM photos WHERE inzerat_id = '$inzerat_id' and hlavny_obrazok = 1";
$photoResults = mysqli_query($conn, $select);
$photoRow = mysqli_fetch_assoc($photoResults);
$hlavny_obrazok_path = $photoRow['path'];  
?>

<div class="card">
    <span class="absolut"></span>
    <div class="cardimg"><img src="<?php echo $hlavny_obrazok_path ?>" alt="" ></div>
    <div class="cardText">        
        <a href="subsite.php?id=<?php echo $row['id'] ?>"><h2><?php echo $row['titulok']; ?></h2></a>
        <p><?php echo $row['datum_vytvorenia']?></p>
        <h1><span style="font-size: 16px; margin-right:10px;">€</span>
        <?php if($row['typ'] == 'Predám') echo $row['cena']; else echo "Zadarmo"?></h1>
        <h4><?php echo $row['psc']." | ".$row['mesto']; ?></h4>
        <a href="subsite.php?id=<?php echo $row['id'] ?>"><h3>Viac<span class="arrow">-></span></h3></a>
    </div>
</div>

