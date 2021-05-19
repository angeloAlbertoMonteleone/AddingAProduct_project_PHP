<?php


class FurnitureRepository
{

  private $databaseManager;

  public function __construct() {
    $this->databaseManager = new DatabaseManager();
  }

  public function executeCreatedQuery($product):array
  {
    $query =
    "INSERT INTO `products` (`sku`, `name`, `price`, `type`, `furniture_height`, `furniture_width`,`furniture_lenght`)
    VALUES (:sku, :name, :price, :type, :furniture_height, :furniture_width, :furniture_lenght)";

    $array = $this->databaseManager->executeQuery($query,
    ["sku" => $product->getSku(),
     "name" => $product->getName(),
     "price" => $product->getPrice(),
     "type" => $product->getType(),
     "furniture_height" => $product->getFurniture_height(),
     "furniture_width" => $product->getFurniture_width(),
     "furniture_lenght" => $product->getFurniture_lenght()]);

     return $array;

  }
}
