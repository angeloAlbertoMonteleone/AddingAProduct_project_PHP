<?php

require_once "Product.php";
require_once __DIR__ ."/../repositories/FurnitureRepository.php";


  class Furniture extends Product
  {
    private $furniture_height;
    private $furniture_width;
    private $furniture_lenght;
    private $furnitureRepository;
    public const TYPE_FURNITURE = "FURNITURE";
    public const MEASURE_TYPE = "dimensions";


    function __construct($furniture_height, $furniture_width, $furniture_lenght)
    {
      $this->furniture_height = $furniture_height;
      $this->furniture_width = $furniture_width;
      $this->furniture_lenght = $furniture_lenght;
      $this->furnitureRepository = new FurnitureRepository();
    }


    public function getFurniture_height() {
      return $this->furniture_height;
    }

    public function getFurniture_width() {
      return $this->furniture_width;
    }

    public function getFurniture_lenght() {
      return $this->furniture_lenght;
    }

    public function setProductType():void
    {
     VerifyProduct_Controller::verifyProduct([$this->furniture_height, $this->furniture_width, $this->furniture_lenght], self::MEASURE_TYPE);
     $this->setType(self::TYPE_FURNITURE);
    }

    public function getArrayFromQuery($product):array
    {
      return $this->furnitureRepository->executeCreatedQuery($product);
    }

  }
