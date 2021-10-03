<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Webshop</title>
        <link rel="stylesheet" href="../css/webshop.css" />
    </head>
    <body>
        <div class="content">
            <form name="resetformulier" method="POST" enctype="multipart/form-data" action="" onsubmit="if(document.resetformulier.wachtwoord1 !== document.resetformulier.wachtwoord2){alert('Wachtwoorden moeten gelijk zijn'); return false;">
            <p id="page_titel">Wachtwoord resetten</P>
            <input required type="password" name="wachtwoord1" placeholder="Nieuw wachtwoord"/><br>
            <input required typwe="password" name="wachtwoord2" placeholder="Herhaal wachtwoord" /> <br>
            <div class="icon_container">
                <input type="submit" class="icon" id="submit" name="submit" value="&rarr;" />
            </div>
            </form
        </div>
    </body>
</html>

<?php
if(isset($_POST["submit"])) {
if(isset($_GET["token"]) && isset($_GET["timestamp"])){
    $token = $_GET["token"];
    $timestamp1 = $_GET["timestamp"];
    $melding = "";
    //zoek in de database voor e-mail en token uit de link
    include("../DBconfig.php");
    $email = htmlspecialchars($_POST["e-mail"]);
    $wachtwoord = htmlspecialchars($_POST["wachtwoord1"]);
    $wachtwoordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);
    try {
        $sql = "SELECT * FROM klant WHERE email = ? AND token = ?";
        $stmt = $verbinding->prepare($sql);
        $stmt->$execute(array($email,$token));
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
        //hier controleer ik of de link verlopen is
        if($stmt) {
            $timestamp2 = new DateTime("now");
            $timestamp2 = $timestamp2->getTimestamp();
            $dif = $timestamp2 - $timestamp1;
        //als link geldig is slaan we nieuw wachtwoord op
            if(($timestamp2 - $timestamp1) < 43200){
                $query = "UPDATE klant SET 'wachtwoord' = ?
                WHERE 'email' = ?";
                $stmt = $verbinding->prepare(query);
                $stmt = $stmt->execute(array($wachtwoordHash, $email));
                if($stmt) {
                    echo "<script>alert('Uw wachtwoord is gereset.');
                    location.href='../index.php';</script>";
                }
            }
        }else{
            echo "<script>alert('Link is verlopen.');
            location.href='../index.php';</script>";
        }
    }
    catch(PDOException $e) {
    echo $e->getMessage();
    }
}
}
?>