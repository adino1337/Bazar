<?php 
    $active = "none";
    include "header.php";
    include "login.php";
?>

<div class="containerRegistration">
    <div class="wrapperRegistration">
    <h2>Nový uživateľ</h2>    
    <form method="post">
        <div class="labelsR">
        <label for="menoR">Meno:</label>
        <label for="priezviskoR">Priezvisko:</label>
        <label for="emailR">Email:</label>
        <label for="loginR">Login:</label>
        <label for="hesloR">Heslo:</label>
        <label for="hesloR2">Potvrďte heslo:</label>
        </div>
        <div class="inputsR">
            <input type="text" name="menoR" placeholder="meno | povinné pole" required>
            <input type="text" name="priezviskoR" placeholder="priezvisko | povinné pole" required>
            <input type="email" name="emailR" placeholder="email | povinné pole" required>
            <input type="text" name="loginR" placeholder="login | povinné pole" required>
            <input type="password" name="hesloR" placeholder="heslo | povinné pole" required>
            <input type="password" name="hesloR2" placeholder="Potvrďte heslo | povinné pole" required>
            <button name="registrationBTN">Vytvoriť uživateľa</button>
        </div>
    </form>
    </div>
</div>

<?php 
    include 'footer.php';
?>