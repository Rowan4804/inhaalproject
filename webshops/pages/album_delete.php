<?php
if(!isset($_SESSION["ID"])&&($_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');location.href='../index.php';</script>";
}
$sql = "DELETE FROM album WHERE ID = ?";
$stmt = $verbinding->prepare($sql);
try{
    $stmt->execute(array($_GET['id']));
    echo "<script>alert('Album is verwijderd.');
    location.href='index.php?page=albums';</script>;
}"catch(PDOException $e) {
    echo $e->getMessage();
}
?>