<?php
$ID = $_GET["ordernummer"];
if(!isset($_SESSION["ID"])&&($_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}

    $orderinfo[0] = "Datum";
    $iteminfo[1] = "titel";
    $klantinfo[2] = "achternaam";
    $aantalinfo[3] = "aantal";
    $aantalinfo[4] = "prijs_eenheid";

//$sql = "SELECT ID, prijs_eenheid, aantal FROM item UNION SELECT Datum, Klant_ID FROM weborder";
$sql = "SELECT Datum, Klant_ID FROM weborder WHERE ID = $ID";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array());
$orderinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $orderinfo[0]["Datum"];
echo $ID;

$sql = "SELECT titel, prijs FROM album WHERE ID = $ID";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array());
$iteminfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo $iteminfo[1]["prijs"];
echo $iteminfo[1]["titel"];

$sql = "SELECT voornaam, achternaam FROM klant WHERE ID = $ID";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array());
$klantinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $klantinfo[2]["achternaam"];

$sql = "SELECT prijs_eenheid, aantal FROM item WHERE weborder_ID = $ID";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array());
$aantalinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $aantalinfo[3]["aantal"];
echo $aantalinfo[4]["prijs_eenheid"];

//echo "<div id='melding'>".$melding."</div>";
    //$onderwerp = "Bestelling ontvangen";
    //$bericht = "Beste $klant, Bedankt voor uw bestelling. Deze bestelling word binnen twee dagen verzonden. Klik '<a href="http//:localhost/webshops/index.php?page=facturering&ordernummer=6">hier om de factuur van uw bestelling weer te geven. Met vriendelijke groeten, De Webshop";
    //mailen($email, $klant, $onderwerp, $bericht);
//echo $ID;
?>
<H1>Factuur</H1>
<table style="width:100%">
  <tr>
    <th>Klant</th>
    <th>Datum</th>
    <th>Ordernummer</th>
  </tr>
  <tr>
    <td><?php echo $klantinfo[2]["achternaam"];?></td>
    <td><?php echo $orderinfo[0]["Datum"];?></td>
    <td><?php echo $ID;?></td>
  </tr>

<table style="width:100%">
    <tr>
     <th>Titel</th>
     <th>Aantal</th>
     <th>Prijs</th>
     <th>Bedrag</th>
  </tr>
  <tr>
    <td><?php echo $iteminfo[1]["titel"];?></td>
    <td><?php echo $aantalinfo[3]["aantal"];?></td>
    <td><?php echo $aantalinfo[4]["prijs_eenheid"];?></td>
    <td>...</td>
  </tr>
</table>