<?php


class DVDRepository
{

  private $databaseManager;

  public function __construct() {
    $this->databaseManager = new DatabaseManager();
  }

  public function executeCreatedQuery(Product $product):array
  {
      $query =
      "INSERT INTO `products` (`sku`, `name`, `price`, `type`, `dvd_disc_mb`)
      VALUES (:sku, :name, :price, :type, :dvd_disc_mb)";

      $array = $this->databaseManager->executeQuery($query,
      ["sku" => $product->getSku(),
       "name" => $product->getName(),
       "price" => (int) $product->getPrice(),
       "type" => $product->getType(),
       "dvd_disc_mb" => $product->getDvd_mb()]);

       return $array;
  }

}
