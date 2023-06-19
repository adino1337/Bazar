<?php 
    
    $active = "add";
    include 'header.php';
    include 'pridatInzServer.php';
    if(!isset($_SESSION['username']))
        header('location:index.php');
    
?>

<div class="containerRegistration">
<img src="blobs/top-right.svg" alt="" style="top: 0; right: 0;" class="line"> 
        <img src="blobs/bottom-right-add.svg" alt="" style="bottom: 0; right: 0;" class="line"> 
    <div class="wrapperRegistration">
        <h2 class="nadpis">Vložte inzerát</h2>
        

        <form method="post" class="addForm" enctype="multipart/form-data">
            
                
                <input type="text" name="nazov" placeholder="Zadajte titulok inzerátu | povinné pole" required>
            
            
                <textarea name="popis" cols="30" rows="10" required placeholder="Zadajte popis inzerátu | povinné pole"></textarea>
            
                <select name="typ">
                    <option value="Predám">Predám</option>
                    <option value="Darujem">Darujem</option>
                </select>
            
                <input type="text" name="cena" placeholder="Zadajte cenu [€] | povinné pole" required>
            
                <input type="text" name="psc" placeholder="Zadajte PSČ | povinné pole"required>
            
                <input type="text" name="mesto" placeholder="Zadajte mesto | povinné pole" required>
            
            <div class="inputWrapper">
                <label for="hlIMG">Hlavný obrázok:</label>
                <input type="file" class="fileInput" name="hlIMG" accept="image/jpg, image/jpeg, image/png" required>
            </div>
            <div class="photos">
            <div class="inputWrapper" >
                <label for="IMG1">Obrázok:</label>
                <input type="file" class="fileInput" name="IMG1" accept="image/jpg, image/jpeg, image/png">
            </div>
            <div class="inputWrapper">
                <label for="IMG2">Obrázok:</label>
                <input type="file" class="fileInput" name="IMG2" accept="image/jpg, image/jpeg, image/png">
            </div>
            <div class="inputWrapper">
                <label for="IMG3">Obrázok:</label>
                <input type="file" class="fileInput" name="IMG3" accept="image/jpg, image/jpeg, image/png">
            </div> 
            </div>              
                <button name="addSubmit" class="login_btn" style="width: 150px;">Vytvoriť inzerát</button>
            
        </form>

    </div>
</div>

<?php 
    include 'footer.php';
?>