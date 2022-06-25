<?php
class Satovi
{
  public $satID;
  public $naziv;
  public $procenatSrebra;
  public $tip;
  public $cena;
  public $proizvod;

  function __construct($satID,$naziv,$procenatSrebra,$tip,$cena,$proizvod) {
      $this->satID = $satID;
      $this->naziv = $naziv;
      $this->procenatSrebra = $procenatSrebra;
      $this->tip = $tip;
      $this->cena = $cena;
      $this->proizvod = $proizvod;
    }

   static function vratiSatove($konekcija){
      $sql = "SELECT * FROM satovi n join proizvod pro on n.proizvodID=pro.proizvodID";

      $rez = $konekcija->query($sql);

      $satovi = [];

      while($red = $rez->fetch_assoc()){

        $proizvod = new Proizvod($red['proizvodID'],$red['nazivProizvoda']);
        $sat = new Satovi($red['satID'],$red['naziv'],$red['procenatSrebra'],$red['tip'],$red['cena'],$proizvod);
        array_push($satovi,$sat);
      }

      return $satovi;

    }
    static function vratiJedanSat($konekcija,$id){
       $sql = "SELECT * FROM satovi n join proizvod pro on n.proizvodID=pro.proizvodID where n.satID=".$id;

       $rez = $konekcija->query($sql);



       while($red = $rez->fetch_assoc()){

         $proizvod = new Proizvod($red['proizvodID'],$red['nazivProizvoda']);
         $satovi = new Satovi($red['satID'],$red['naziv'],$red['procenatSrebra'],$red['tip'],$red['cena'],$proizvod);
       }

       return $satovi;

     }

   static function vratiSatoveSortirane($konekcija,$sort){
       $sql = "SELECT * FROM satovi n join proizvod pro on n.proizvodID=pro.proizvodID order by n.cena ".$sort;

       $rez = $konekcija->query($sql);

       $satovi = [];

       while($red = $rez->fetch_assoc()){

         $proizvod = new Proizvod($red['proizvodID'],$red['nazivProizvoda']);
         $sat = new Satovi($red['satID'],$red['naziv'],$red['procenatSrebra'],$red['tip'],$red['cena'],$proizvod);
         array_push($satovi,$sat);
       }

       return $satovi;

     }


    function dodajSatove($konekcija){
      $sql = "INSERT INTO satovi(naziv,cena,tip,proizvodID,procenatSrebra) VALUES ('$this->naziv',$this->cena,'$this->tip',$this->proizvod,$this->procenatSrebra)";

      if($konekcija->query($sql)){
        return true;
      }else{
        return false;
      }
    }

    function izmeniSatove($konekcija){
      $sql = "UPDATE satovi SET naziv='$this->naziv' ,cena=$this->cena,tip= '$this->tip',proizvodID=$this->proizvod,procenatSrebra=$this->procenatSrebra where satID=$this->satID";

      if($konekcija->query($sql)){
        return true;
      }else{
        return false;
      }
    }
    function obrisiSatove($konekcija){
      $sql = "DELETE FROM satovi where satID=$this->satID";

      if($konekcija->query($sql)){
        return true;
      }else{
        return false;
      }
    }

}



 ?>

