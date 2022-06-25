<?php
include 'konekcija.php';
include 'proizvodKlasa.php';
include 'satoviKlasa.php';

$sortiranje = $_GET['sort'];
$min = floatval($_GET['min']);
$max = floatval($_GET['max']);

$podaci = Satovi::vratiSatoveSortirane($konekcija,$sortiranje);

 ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Naziv</th>
      <th>Proizvod</th>
      <th>Tip</th>
      <th>Cena</th>
      <th>Procenat srebra</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($podaci as $satovi){
          if($satovi->procenatSrebra > $min && $satovi->procenatSrebra < $max){
            ?>
            <tr>
              <td><?php echo $satovi->naziv ?></td>
              <td><?php echo $satovi->proizvod->nazivProizvoda ?></td>
              <td><?php echo $satovi->tip ?></td>
              <td><?php echo $satovi->cena ?> dinara</td>
              <td><?php echo $satovi->procenatSrebra ?> %</td>
            </tr>
            <?php
          }
        }
    ?>
  </tbody>
</table>