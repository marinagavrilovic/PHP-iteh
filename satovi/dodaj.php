<?php

include 'konekcija.php';
include 'proizvodKlasa.php';
include 'satoviKlasa.php';

$podaciProizvoda = Proizvod::vratiProizvode($konekcija);
$poruka = "";

if(isset($_POST['sacuvaj'])){

  $naziv = trim($_POST['naziv']);
  $tip = trim($_POST['tip']);
  $cena = trim($_POST['cena']);
  $procenat = trim($_POST['procenat']);
  $proizvod = trim($_POST['proizvod']);

  $satovi = new Satovi(0,$naziv,$procenat,$tip,$cena,$proizvod);
  if($satovi->dodajSatove($konekcija)){
    $poruka = "Uspesno sacuvan sat";
  }else{
    $poruka = "Neuspesno sacuvan sat";
  }
}

 ?>


<!DOCTYPE HTML>
<html lang="en-gb" class="no-js">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Brendirani satovi</title>
<meta name="description" content="">
<meta name="author" content="Perlissima">

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

<div class="container">
   <div class="row">
   <div class="col-lg-12">
      <h1>Brendirani satovi - forma za dodavanje satova</h1>
    </div>
    <div class="col-lg-12">
      <form action="dodaj.php" method="POST">
        <label for="naziv">Naziv</label>
        <input type="text" name="naziv" id="naziv" placeholder="Unesite naziv satovia" class="form-control">
        <label for="cena">Cena</label>
        <input type="text" name="cena" id="cena" placeholder="Unesite cenu satovia" class="form-control">
        <label for="procenat">Procenat</label>
        <input type="text" name="procenat" id="procenat" placeholder="Unesite procenat srebra " class="form-control">
        <label for="tip">Tip</label>
        <input type="text" name="tip" id="tip" placeholder="Unesite tip satovia" class="form-control">

        <label for="proizvod">Brend</label>
        <select id="proizvod" name="proizvod" class="form-control">
          <?php
            foreach($podaciProizvoda as $proizvod){
              ?>
              <option value="<?php echo $proizvod->proizvodID ?>"><?php echo $proizvod->nazivProizvoda; ?></option>
              <?php
            }

           ?>
        </select>
        <label for="sacuvaj"></label>
        <input type="submit" name="sacuvaj" id="sacuvaj" style="background-color: #333;" value="Sacuvaj" class="form-control btn-primary">
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

</body>
</html>
