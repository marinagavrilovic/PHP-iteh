<?php
include 'konekcija.php';
include 'proizvodKlasa.php';
include 'satoviKlasa.php';


$podaci = Satovi::vratiSatove($konekcija);

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

<div class="container">
   <div class="row">
   <div class="col-lg-12">
      <h1>Satovi Andrejevic - forma za brisanje i izmenu</h1>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Naziv</th>
            <th>Proizvod</th>
            <th>Tip</th>
            <th>Cena</th>
            <th>Procenat srebra</th>
            <th>Izmeni</th>
            <th>Obrisi</th>
          </tr>
        </thead>
        <tbody>
          <?php
              foreach($podaci as $satovi){
                  ?>
                  <tr>
                    <td><?php echo $satovi->naziv ?></td>
                    <td><?php echo $satovi->proizvod->nazivProizvoda ?></td>
                    <td><?php echo $satovi->tip ?></td>
                    <td><?php echo $satovi->cena ?> dinara</td>
                    <td><?php echo $satovi->procenatSrebra ?> %</td>
                    <td><a href="izmeni.php?id=<?php echo $satovi->satID ?>" class="btn btn-success">Izmeni</a> </td>
                    <td><a href="obrisi.php?id=<?php echo $satovi->satID ?>" class="btn btn-danger">Obrisi</a> </td>
                  </tr>
                  <?php

              }
          ?>
        </tbody>
      </table>

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
