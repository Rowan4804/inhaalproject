<?php
if(!isset($_SESSION["ID"])&&($_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>"
    alert('U beeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}
if(isset($_POST['submit'])){
    $id = htmlspecialchars($_POST['id']);
    $titel = htmlspecialchars($_POST['titel']);
    $artiest = htmlspecialchars($_POST['artiest']);
    $genre = htmlspecialchars($_POST['genre']);
    $prijs = htmlspecialchars($_POST['prijs']);
    $sql = "UPDATE album SET 'titel' = ? WHERE 'ID' = ?, 'genre' = ?, 'prijs' = ? WHERE 'ID' = ?";
    $stmt = $verbinding->prepare($sql);
    try{
        $stmt = $stmt->execute(array($titel, $artiest, $genre, $prijs, $id));
    echo "<script>alert('Album is geüpdatet.');
        location.href='index.php?page=albums';
        </script>";
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>