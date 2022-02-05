<?php
include_once 'header.php';
?>

<section class="signup-form">
    <h1>Bejelentkezés</h1>
    <div class="signup-form-form">
        <form action="includes/login.inc.php" method="post"><br>
            <input type="text" name="email" placeholder="Email..."><br>
            <input type="password" name="password" placeholder="Jelszó..."><br>
            <button type="submit" name="submit">Bejelentkezés</button>
        </form>
    </div>
    <?php
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo'<script type="text/javascript">window.alert("Tölts ki minden mezőt!");</script>';
    }
    else if($_GET["error"]=="wronglogin"){
        echo'<script type="text/javascript">window.alert("Rossz adatokat adtál meg!");</script>';
    }
}
?>
</section>



<?php
include_once 'footer.php';
?>