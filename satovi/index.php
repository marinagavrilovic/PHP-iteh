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
      <h1>Satovi Andrejevic</h1>
    </div>
    <div class="col-lg-6">
      <label for="minP">Minimum procenata srebra</label>
      <input type="text" id="minP" value="0" class="form-control" onkeyup="showHint(this.value)">
      <p>Primer: <span id="txtHint"></span></p>
     </div>
     <div class="col-lg-6">
       <label for="maxP">Maksimum procenata srebra</label>
       <input type="text" id="maxP" value="100" class="form-control">
      </div>
      <div class="col-lg-12">
        <label for="sortiranje">Sortiraj po ceni</label>
        <select id="sortiranje" class="form-control">
          <option value="asc">Rastuce po ceni</option>
          <option value="desc"> Opadajuce po ceni</option>
        </select>
      </div>
      <div class="col-lg-12">
        <label for="pretrazi"></label>
        <input type="button" id="pretrazi" style="background-color: #555;" value="Pretrazi" class="form-control btn-primary" onclick="pretrazi()">
       </div>
       <div id="rezultatPretrage"></div>

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

function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "gethint.php?q="+str, true);
    xmlhttp.send();
  }
}
</script>


</script>
</body>
</html>
