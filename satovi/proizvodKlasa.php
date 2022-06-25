<?php
class Proizvod
{
  public $proizvodID;
  public $nazivProizvoda;

  function __construct($proizvodID,$nazivProizvoda) {
			$this->proizvodID = $proizvodID;
      $this->nazivProizvoda = $nazivProizvoda;
		}

   static function vratiProizvode($konekcija){
      $sql = "SELECT * FROM proizvod";

      $rez = $konekcija->query($sql);

      $proizvodi = [];

      while($red = $rez->fetch_assoc()){

        $proizvod = new Proizvod($red['proizvodID'],$red['nazivProizvoda']);
        array_push($proizvodi,$proizvod);
      }

      return $proizvodi;

    }
}



 ?>
