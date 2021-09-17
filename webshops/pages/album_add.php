<?php
if(!isset($_SESSION["ID"])&&($_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}
include("album_add.html");
if(isset($_POST["submit"])) {
    $melding = "";
    $titel = htmlspecialchars($_POST['titel']);
    $artiest = htmlspecialchars($_POST['artiest']);
    $genre = htmlspecialchars($POST['genre']);
    $prijs = htmlspecialchars($POST['prijs']);
    $voorraad = htmlspecialchars($POST['voorraad']);
    $cover = htmlspecialchars($POST['cover']);

    $sql = "INSERT INTO album (ID, titel, artiest, genre, prijs, voorraad, cover) values (?,?,?,?,?,?,?)";
    $stmt = $verbinding->prepare($sql);
    try{
        $stmt->execute(array(
            NULL
            $titel,
            $artiest,
            $genre,
            $prijs,
            $voorraad,
            $cover)
        );
        $melding = "Nieuw album toegevoegd.";
    }
    catch(PDOException $e) {
        $melding="Kon geen nieuw album aanmaken.".$e->getMessage();
    }
    echo "<div id='melding'>".$melding> "</div>";
}
?>