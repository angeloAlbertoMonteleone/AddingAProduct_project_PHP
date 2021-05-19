<?php

class Post
{
  private $sku;
  private $name;
  private $price;
  private $type;
  private $size;
  private $measure;


    public function getSku() {
      return $this->sku;
    }

    public function setSku($sku) {
      $this->sku = $sku;
    }

    public function getName() {
      return $this->name;
    }

    public function setName($name) {
      $this->name = $name;
    }

    public function getPrice() {
      return $this->price;
    }

    public function setPrice($price) {
      $this->price = $price;
    }

    public function getType() {
      return $this->type;
    }

    public function setType($type) {
      $this->type = $type;
    }

    public function getMeasure() {
      return $this->measure;
    }

    public function setMeasure($measure) {
      $this->measure = $measure;
    }




      // function __construct($sku,$name, int $price,string $type, $size = null, $weight = null,
      // $furniture_height = null, $furniture_width = null, $furniture_lenght = null)
      // {
      //
      //   $this->sku = $sku;
      //   $this->name = $name;
      //   $this->price = $price;
      //   $this->type = $type;
      //   $this->measure = $measure;
      //   }
}
