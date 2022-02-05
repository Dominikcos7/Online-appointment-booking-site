<?php
include_once 'header.php';
?>

<section class="signup-form">
    <h1>Regisztráció</h1>
    <form action="includes/register.inc.php" method="post"><br>
        <input type="text" name="fullname" placeholder="Teljes név..."><br>
        <input type="text" name="email" placeholder="Email..."><br>
        <input type="text" name="telnumber" placeholder="Telefonszám...(pl: 06/30-123-4567)"><br>
        <input type="password" name="password" placeholder="Jelszó..."><br>
        <input type="password" name="passwordAgain" placeholder="Jelszó megint..."><br>
        <button type="submit" name="submit">Regisztráció</button>
    </form>
    <?php
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo'<script type="text/javascript">window.alert("Tölts ki minden mezőt!");</script>';
    }
    else if($_GET["error"]=="invalidusername"){
        echo'<script type="text/javascript">window.alert("Adj meg egy valódi felhasználónevet!");</script>';
    }
    else if($_GET["error"]=="invalidemail"){
        echo'<script type="text/javascript">window.alert("Adj meg egy valódi emailt!");</script>';
    }
    else if($_GET["error"]=="passnotmatching"){
        echo'<script type="text/javascript">window.alert("A jelszavak nem egyeznek meg!");</script>';
    }
    else if($_GET["error"]=="stmtfailed"){
        echo'<script type="text/javascript">window.alert("Valami félresikerült...");</script>';
    }else if($_GET["error"]=="emailtaken"){
        echo'<script type="text/javascript">window.alert("Ezzel az emaillel már regisztráltak!");</script>';
    }
    else if($_GET["error"]=="none"){
        echo'<script type="text/javascript">window.alert("Sikeres regisztráció!");</script>';
    }
}
?>
</section>



<?php
include_once 'footer.php';
?>