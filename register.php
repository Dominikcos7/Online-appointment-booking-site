<?php
include_once 'header.php';
?>


<div class="forms-wrapper">
    <h1>Regisztráció</h1>
    <form action="includes/register.inc.php" method="post"><br>
        <input type="text" name="fullname" placeholder="Teljes név..."><br>
        <input type="text" name="email" placeholder="Email..."><br>
        <input type="text" name="telnumber" placeholder="Telefonszám...(pl: 06/30-123-4567)"><br>
        <input type="password" name="password" placeholder="Jelszó..."><br>
        <input type="password" name="passwordAgain" placeholder="Jelszó megint..."><br>
        <button type="submit" name="submit" id="submit">Regisztráció</button>
    </form>
<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo'<p class="errormessage">Nem töltöttél ki minden mezőt!</p>';
    }
    else if($_GET["error"]=="invalidemail"){        
        echo'<p class="errormessage">Rossz emailt adtál meg!</p>';
    }
    else if($_GET["error"]=="passnotmatching"){
        echo'<p class="errormessage">A jelszavak nem egyeznek meg!</p>';
    }
    else if($_GET["error"]=="stmtfailed"){
        echo'<p class="errormessage">Ezzel az emaillel már regisztráltak!</p>';
    }else if($_GET["error"]=="emailtaken"){
        echo'<p class="errormessage">Ezzel az emaillel már regisztráltak!</p>';
    }
    else if($_GET["error"]=="none"){
        echo'<p class="errormessage">Sikeres regisztráció!</p>';
    }
}
?>
</div>




<?php
include_once 'footer.php';
?>