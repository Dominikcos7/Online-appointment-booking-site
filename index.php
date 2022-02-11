<?php include_once 'header.php';?>
<link rel="stylesheet" href="frontpage.css">

<h1>Üdvözöllek a főoldalon!</h1>

<div class="noi-fodraszat-wrapper">
    <h2>Női fodrászat</h2>
    <h3>Szolgáltatások: </h3>
    <form action="serviceshandler.inc.php" method="post">
    <input type="checkbox" name="noi-fodraszat-szolg[]" value="szolg1n">Szolg1<br>
    <input type="checkbox" name="noi-fodraszat-szolg[]" value="szolg2n">Szolg2<br>
    <input type="checkbox" name="noi-fodraszat-szolg[]" value="szolg3n">Szolg3<br>
    <input type="checkbox" name="noi-fodraszat-szolg[]" value="szolg4n">Szolg4<br>
    <input type="checkbox" name="noi-fodraszat-szolg[]" value="szolg5n">Szolg5<br>
    <input type="submit" name="submit-noi-fodraszat" value="Kiválasztom">
    </form>

</div>

<div class="ferfi-fodraszat-wrapper">
    <h2>Férfi fodrászat</h2>
    <h3>Szolgáltatások: </h3>
    <form action="serviceshandler.inc.php" method="post">
    <input type="checkbox" name="ferfi-fodraszat-szolg[]" value="szolg1f">Szolg1<br>
    <input type="checkbox" name="ferfi-fodraszat-szolg[]" value="szolg2f">Szolg2<br>
    <input type="checkbox" name="ferfi-fodraszat-szolg[]" value="szolg3f">Szolg3<br>
    <input type="submit" name="submit-ferfi-fodraszat" value="Kiválasztom">
    </form>

</div>

<div class="gyerek-fodraszat-wrapper">
    <h2>Gyerek fodrászat</h2>
    <h3>Szolgáltatások: </h3>
    <form action="serviceshandler.inc.php" method="post">
    <input type="checkbox" name="gyerek-fodraszat-szolg[]" value="szolg1gy">Szolg1<br>
    <input type="checkbox" name="gyerek-fodraszat-szolg[]" value="szolg2gy">Szolg2<br>
    <input type="checkbox" name="gyerek-fodraszat-szolg[]" value="szolg3gy">Szolg3<br>
    <input type="submit" name="submit-gyerek-fodraszat" value="Kiválasztom">
    </form>

</div>

<div class="mukorom-wrapper">
    <h2>Műköröm</h2>
    <h3>Szolgáltatások: </h3>
    <form action="serviceshandler.inc.php" method="post">
    <input type="checkbox" name="mukorom-szolg[]" value="szolg1m">Szolg1<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg2m">Szolg2<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg3m">Szolg3<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg4m">Szolg4<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg5m">Szolg5<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg6m">Szolg6<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg7m">Szolg7<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg8m">Szolg8<br>
    <input type="checkbox" name="mukorom-szolg[]" value="szolg9m">Szolg9<br>
    <input type="submit" name="submit-mukorom" value="Kiválasztom">
    </form>

</div>



<?php include_once 'footer.php';?>