<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

function mailen($ontvangerStraat, $ontvangerNaam, $onderwerp, $bericht){
    $mail = new PHPMailer();

    //verbinding maken met php
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;

    //Identificatie bij Gmail
    $mail->Username = "rowanweichungchangschotanus@gmail.com";
    $mail->Password = "Diesel112";

    //email opstellen
    $mail->isHTML(true);
    $mail->SetFrom("rowanweichungchangschotanus@gmail.com", "Naam");
    $mail->Subject = $onderwerp;

    $mail->Charset = 'UTF-8';
    $bericht = "<body style=\"font-family: Verdana, Verdana,
                Geneva, sans-serif; font-size: 14px; color: #000;\">".
    $bericht = "</body></html>";
    $mail->AddAddress($ontvangerStraat, $ontvangerNaam);
    $mail->Body = $bericht;

    //stuur mail
    if($mail->Send()){
        echo"<script>alert('Mail is verstuurd' );</script>";
    }else{
        echo"<script>alert('Kon geen mail versturen');</script>";
    }
    }
?>