<?php

include 'konekcija.php';
include 'proizvodKlasa.php';
include 'satoviKlasa.php';

$id = $_GET['id'];


$podaciProizvoda = Proizvod::vratiProizvode($konekcija);
$poruka = "";

if(isset($_POST['izmeni'])){

  $naziv = trim($_POST['naziv']);
  $tip = trim($_POST['tip']);
  $cena = trim($_POST['cena']);
  $procenat = trim($_POST['procenat']);
  $proizvod = trim($_POST['proizvod']);

  $satovi = new Satovi($id,$naziv,$procenat,$tip,$cena,$proizvod);
  if($satovi->izmeniSatove($konekcija)){
    header("Location:izbrisiiizmeni.php");
  }else{
    $poruka = "Neuspesno izmenjen satovi";
  }
}

$satoviZaIzmenu = Satovi::vratiJedanSat($konekcija,$id);

 ?>
<!DOCTYPE HTML>
<html lang="en-gb" class="no-js">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Satovi Andrejevic</title>
<meta name="description" content="">
<meta name="author" content="Satovi Andrejevic">

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/styles.css" />
<link rel="stylesheet" href="css/style-animate.css" />
<link href="font/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/slider.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">

</head>

<body style="background-color: black;>


<?php include 'meni.php'; ?>

<?php include 'slajder.php'; ?>

<div class="col-lg-12">
      <h1>Satovi Andrejevic - forma za dodavanje i izmenu satova</h1>
    </div>
    <div class="col-lg-12">
      <form action="" method="POST">
        <label for="naziv">Naziv</label>
        <input type="text" name="naziv" id="naziv" value="<?php echo $satoviZaIzmenu->naziv ?>" class="form-control">
        <label for="cena">Cena</label>
        <input type="text" name="cena" id="cena" value="<?php echo $satoviZaIzmenu->cena ?>" class="form-control">
        <label for="procenat">Procenat</label>
        <input type="text" name="procenat" id="procenat" value="<?php echo $satoviZaIzmenu->procenatSrebra ?>" class="form-control">
        <label for="tip">Tip</label>
        <input type="text" name="tip" id="tip" value="<?php echo $satoviZaIzmenu->tip ?>" class="form-control">

        <label for="proizvod">Proizvod</label>
        <select id="proizvod" name="proizvod" class="form-control">
          <option value="<?php echo $satoviZaIzmenu->proizvod->proizvodID ?>"><?php echo $satoviZaIzmenu->proizvod->nazivProizvoda; ?></option>
          <?php
            foreach($podaciProizvoda as $proizvod){
              if($satoviZaIzmenu->proizvod->proizvodID != $proizvod->proizvodID){
              ?>
              <option value="<?php echo $proizvod->proizvodID ?>"><?php echo $proizvod->nazivProizvoda; ?></option>
              <?php
            }
          }

           ?>
        </select>
        <label for="izmeni"></label>
        <input type="submit" name="izmeni" id="izmeni" value="Izmeni satove" class="form-control btn-primary">
      </form>
      <h3> <?php echo $poruka; ?></h3>
     </div>


  </div>

<?php include 'futer.php'; ?>
</div>

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jssor.js" type="text/javascript"></script>
<script src="js/jssor.slider.js" type="text/javascript"></script>
<script src="js/slider.js" type="text/javascript"></script>

<script>
  function pretrazi(){
    $.ajax({
      url: "pretraga.php",
      data: {sort: $("#sortiranje").val(), min: $("#minP").val() , max: $("#maxP").val()},
      success: function(html){
        $("#rezultatPretrage").html(html);
      }
      });
  }


</script>
</body>
</html>

