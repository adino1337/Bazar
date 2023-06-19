<?php 
    $active = "uvod";
    include "header.php";
    include "config.php";
    $cenaMax = 14500;
    $cenaMin = 0;    
    $vsetko = True;
    $predam = False;
    $darujem = False;
    if(isset($_POST['filter'])){
    $cenaMax = $_POST['cenaMax'];
    $cenaMin = $_POST['cenaMin'];
    if($_POST['typ'] == "Predám"){
        $vsetko = false;
        $predam = true;
        $darujem = false;
        }
        else if($_POST['typ'] == "Darujem"){
            $vsetko = false;
            $predam = false;
            $darujem = true;            
        }
        else{
            $vsetko = true;
            $predam = false;
            $darujem = false;
        }}
?>
    <div class="heroIMG" style="border-bottom: 4px solid #04c582;">
        <div class="popis">
            <h1>ZENIT-BAZÁR | OBČIANSKA INZERCIA</h1>
            <p>ideálne miesto pre Vašu inzerciu...</p>
        </div>
    </div>

    <div class="containerRegistration">      
        <img src="blobs/Curve Line top-left.svg" alt="" style="top: 0; left: 0;" class="line">  

        <img src="blobs/Curve Line bottom-right.svg" alt="" style="bottom: 0; right: 0;" class="line"> 

        <div class="wrapperRegistration">
        <div class="filter">
            
            <form method="POST">  
            <h3 style="width: 100%; margin: 0; color: var(--whiteTX);">Filter</h3>

                <div class="radios">

                <label class="containerRadioButton">                                 
                  <input type="radio" name="typ" value="vsetko" <?php if($vsetko) echo "checked='checked'"; ?>>
                  <div class="filler"></div>  
                  <h4>Všetko</h4>
                                   
                </label>

                <label class="containerRadioButton">                               
                  <input type="radio" name="typ" value="Predám" <?php if($predam) echo "checked='checked'"; ?>>
                  <div class="filler"></div>    
                  <h4>Predám</h4>
                                  
                </label>

                <label class="containerRadioButton">
                <input type="radio" name="typ" value="Darujem" <?php if($darujem) echo "checked='checked'"; ?>>
                <div class="filler"></div>
                  <h4>Darujem</h4>                  
                </label>

                </div>
                <div class="prices">                
                <div class="minCena">
                    <label for="cenaMin">Min:</label>
                    <input type="range" name="cenaMin" value="<?php echo $cenaMin?>" min="0" max="14500" oninput="this.nextElementSibling.value = this.value+' €'">
                    <output><?php echo $cenaMin?> €</output>
                </div>
                <div class="maxCena">
                    <label for="cenaMax">Max:</label>
                    <input type="range" name="cenaMax" value="<?php echo $cenaMax?>" min="0" max="14500" oninput="this.nextElementSibling.value = this.value+' €'">
                    <output><?php echo $cenaMax?> €</output>
                </div>
                </div>
                <div class="buttons">
                <button class="login_btn" name="filter">Vyhľadať</button>
                <button class="login_btn" name="reset">Reset</button>
                
                </div>
            </form>
        </div>
            
        <?php 

            
            if(isset($_POST['reset'])){
                $vsetko = true;
                $predam = false;
                $darujem = false;
                $cenaMax = 14500;
                $cenaMin = 0;
                include 'mainPage.php';
            }
            else if(isset($_POST['filter'])){   
            
            $minCena = mysqli_escape_string($conn, $_POST['cenaMin']);
            $maxCena = mysqli_escape_string($conn, $_POST['cenaMax']);
            
            
            if($_POST['typ'] != "vsetko")
                $typ = "and typ LIKE '".$_POST['typ']."'";        
            else
                $typ = mysqli_escape_string($conn, "");
            $select = "SELECT * FROM inzerat WHERE cena >= '$minCena' and cena <= '$maxCena' ".$typ."";            
            $results = mysqli_query($conn, $select);
            if(mysqli_num_rows($results) > 0){
                $riadky = mysqli_num_rows($results);
                echo "<h2 class='nadpis'>Zoznam inzerátov (".$riadky.")</h2>";
                echo "<div class='inzeraty'>";
            while($row = mysqli_fetch_assoc($results)){                                
                include 'inzerat.php';         
        }        
        }
        else
            echo "žiaden inzerát";
        }
        else{            
            include 'mainPage.php';            
        }
        ?>
         
        
        </div>
        
        </div>
    </div>
    

<?php 
    include 'footer.php';
?>