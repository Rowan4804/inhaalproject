<?php
if(!isset($_SESSION["ID"])&&($_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert ('U heeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}
$sql = "SELECT * FROM album WHERE ID = ?";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array($_GET['id']));
$albums = $stmt->fetchAll (PDO::FETCH_ASSOC);
foreach($albums as $album) {
?>
<div class="content">
    <form name="edit" class="form"
    action="index.php?page=album_update"
    method="POST">
    <p id="page_titel">Edit album</p>
    <input type="hidden" name="id" id="id"
    value="<?php echo $album['ID']; ?>" />
    <label>Titel:</label>
    <input type="text" name="titel" id="titel"
    value="<?php echo $album['titel']; ?>" />
    <label>Artiest:</label>
    <input type="text" name="artiest" id="ariest"
    value="<?php echo $album['artiest']; ?>" />
    <label>Genre:</label>
    <input type="text" name="genre" id="genre"
    value="<?php echo $album['genre']; ?>" />
    <label>Prijs:</label>
    <input type="text" name="prijs" id="prijs"
    value="<?php echo $album['prijs']; ?>" />
<br>
<div class="icon_container">
    <input type="submit" class="icon" id="submit"
    name="submit" value="&rarr;" />
</div>
<a href="index.php?page=albums">Terug</a>
</form>
</div>
<?php
}
?>