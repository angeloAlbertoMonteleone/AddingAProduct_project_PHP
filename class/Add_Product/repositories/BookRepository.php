<?php


class BookRepository
{

  private $databaseManager;

  public function __construct() {
    $this->databaseManager = new DatabaseManager();
  }

  public function executeCreatedQuery($product):array
  {
    $query =
    "INSERT INTO `products` (`sku`, `name`, `price`, `type`, `book_kg`)
    VALUES (:sku, :name, :price, :type, :book_kg)";

    $array = $this->databaseManager->executeQuery($query,
    ["sku" => $product->getSku(),
     "name" => $product->getName(),
     "price" => $product->getPrice(),
     "type" => $product->getType(),
     "book_kg" => $product->getBook_kg()]);

     return $array;
  }
}
