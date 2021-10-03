<?php
if(!isset($_SESSION["ID"])&&($_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}
if(isset($_POST["submit"])) {
    //Weborder aanaken
    $datum = new DateTime();
    $datum = date_format($datum,"c");
    $sql = "INSERT INTO weborder (ID, klant_ID, datum) values (?,?,?)";
    $stmt = $verbinding->prepare($sql);
    $data = array(NULL, $_SESSION['USER_ID'], $datum);
    try {
        $stmt->execute($data);
        echo"<script>alert('Bestelling aangemaakt.');</script>";
    }catch(PDOException $e) {
        echo $e->getMessage();
        echo"<script>alert('Kon geen bestelling aanmaken');</script>";
        echo "<script>location.href='index.php?page=webshop';</script>";
    }
    //haal weborder_id uit de laatste bestelling
    $weborder_id = $verbinding->lastInsertId();
    //Items opslaan

    for($x=0; $x < $_POST['lus']; $x++){
        $aantal = htmlspecialchars($_POST['aantal'][$x]);
        if($aantal == 0) continue;
        $album_id = $_POST['id'][$x];
        $prijs_eenheid = $_POST['prijs'][$x];
        $sql = "INSERT INTO item (ID, weborder_ID, klant_ID, album_ID, prijs_eenheid, aantal) values (?,?,?,?,?,?)";
        $stmt = $verbinding->prepare($sql);
        $data = array(NULL, $weborder_id, $_SESSION["USER_ID"], $album_id, $prijs_eenheid, $aantal);

        try{
            $stmt->execute($data);
            echo "<script>alert('Item opgeslagen ');</script>";
        }catch(PDOException $e) {
            echo $e->getMessage();
            echo "<script>alert('Kon geen item opslaan ');</script>";
        }
        echo "<script>location.href='index.php?page=webshop';</script>";
    }
    echo "check";
}
?>