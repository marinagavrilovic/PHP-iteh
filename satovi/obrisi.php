<?php

include 'konekcija.php';
include 'proizvodKlasa.php';
include 'satoviKlasa.php';

$id = $_GET['id'];
$poruka ="";

  $satovi = new Satovi($id,"",0,"",0,0);
  if($satovi->obrisiSatove($konekcija)){
    header("Location:izbrisiiizmeni.php");
  }else{
    $poruka = "Neuspesno obrisan sat";
    echo $poruka;
  }

 ?>
