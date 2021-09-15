<?php
if(!isset($_SESSION["ID"])&&$_SESSION["STATUS"]!="ACTIEF"){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}
?>