<?php 
echo "<h2 class='nadpis'>Najnovšie inzeráty</h2>";
echo "<div class='inzeraty'>";
$select = "Select * FROM inzerat WHERE typ LIKE 'Predám' ORDER BY `inzerat`.`datum_vytvorenia` DESC LIMIT 1;";
$results = mysqli_query($conn, $select);
if(mysqli_num_rows($results)>0){
    $row = mysqli_fetch_assoc($results);
        include 'inzerat.php';                
}
$select = "Select * FROM inzerat WHERE typ LIKE 'Darujem' ORDER BY `inzerat`.`datum_vytvorenia` DESC LIMIT 1;";
$results = mysqli_query($conn, $select);
if(mysqli_num_rows($results)>0){
    $row = mysqli_fetch_assoc($results);
        include 'inzerat.php';                
}
?>
