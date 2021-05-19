<?php

require_once "Furniture.php";
require_once "Dvd_disc.php";
require_once "Book.php";
require_once __DIR__ ."/../repositories/ProductRepository.php";


abstract class Product
{

  private $sku;
  private $name;
  private $price;
  private $type;

  private $productRepository;


  function __construct()
  {
    $this->productRepository = new ProductRepository();
  }

  public function getSku() {
    return $this->sku;
  }

  public function setSku($sku){
    $this->sku = $sku;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function getPrice() {
    return $this->price;
  }

  public function setPrice($price){
    $this->price = $price;
  }

  public function getType() {
    return $this->type;
  }

  public function setType($type) {
    $this->type = $type;
  }

  //
  // public function getProductBySku() {
  //   $sku = $this->sku;
  //   $productRepository = new ProductRepository();
  //   $product = ProductRepository::findProductBySku($sku);
  //   var_dump($product);die;
  // }

}
