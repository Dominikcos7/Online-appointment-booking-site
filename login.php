<?php
include_once 'header.php';
?>

<div class="forms-wrapper">
    <h1>Bejelentkezés</h1>
    <div class="signup-form-form">
        <form action="includes/login.inc.php" method="post"><br>
            <input type="text" name="email" placeholder="Email..."><br>
            <input type="password" name="password" placeholder="Jelszó..."><br>
            <button type="submit" name="submit" id="submit">Bejelentkezés</button>
        </form>
    </div>
<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo'<p class="errormessage">Nem Töltöttél ki minden mezőt!</p>';
    }
    else if($_GET["error"]=="wronglogin"){
        echo'<p class="errormessage">Rossz adatokat adtál meg!</p>';
    }
}
?>
</div>



<?php
include_once 'footer.php';
?>