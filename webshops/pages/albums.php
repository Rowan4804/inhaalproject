<?php
if(!isset($_SESSION["ID"])&&($_SESSION["STATUS"]!="ACTIEF")){
    echo <script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}
?>
<div class="content">
<table id='table' border="0" cellspacing="3">
    <caption>
    <h3>Edit albums</h3>
    </caption>
    <thead>
    <tr>
    <th>Titel</th>
    <th>Artiest</th>
    <th>Genre</th>
    <th>Prijs</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM album";
    $stmt = $verbinding->prepare($sql);
    $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $bgcolor = true;
    foreach($albums as $album) {
        $id = $album['ID'];
        echo (bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
        echo
        "<td>".$album['titel']."</td>".
        "<td>".$album['artiest']."</td>".
        "<td>".$album['genre']."</td>".
        "<td>".$album['prijs']."</td>".
        "<td><a style='text-decoration:none'
        href='index.php?page=album_delete&id=".
        $album['ID']."'>&#10062;</a></td></tr>";
        $bgcolor= ($bgcolor ? false:true);
}
?>
</tbody>
<tfoot>
<tr>
    <th colspan="6">
        <a class="add" href="index.php?page=album_add">&#10012;</a>
    </th>
<tr>
    <td colspan="6">
        <a href="index.php?page=webshop">Terug</a>
    </td>
</tr>
</tfoot>
</table>
</div>