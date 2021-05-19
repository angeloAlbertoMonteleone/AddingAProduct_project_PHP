<?php

require_once "Product.php";
require_once __DIR__ ."/../repositories/DVDRepository.php";
require_once __DIR__ ."/../controllers/VerifyProduct_Controller.php";

class Dvd_disc extends Product
{
  private $dvd_disc_mb;
  private $dvdRepository;
  public const TYPE_DVD_DISC = "DVD_DISC";
  public const MEASURE_TYPE = "size";


  function __construct($dvd_disc_mb)
  {
    $this->dvd_disc_mb = $dvd_disc_mb;
    $this->dvdRepository = new DVDRepository();
  }

  public function getDvd_mb() {
    return $this->dvd_disc_mb;
  }


  public function setProductType():void
  {
    VerifyProduct_Controller::verifyProduct([$this->dvd_disc_mb], self::MEASURE_TYPE);
    $this->setType(self::TYPE_DVD_DISC);
  }


  public function getArrayFromQuery($product):array
  {
    return $this->dvdRepository->executeCreatedQuery($product);
  }

}
