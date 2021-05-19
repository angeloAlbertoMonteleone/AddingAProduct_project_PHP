<?php

require_once __DIR__ . "\..\models\Product.php";
require_once __DIR__ . "\..\..\DatabaseManager.php";


class ProductRepository
{
    private $databaseManager;

    public function __construct() {
      $databaseManager = new DatabaseManager();
    }


    public function findProductBySku(string $sku): array
    {
      $query = "SELECT * FROM products WHERE sku = :sku";

      $result = $databaseManager->executeQuery($query,
      ["sku" => $sku]);

      if(count($result) <= 0) {
        return null;
      }
      return $result[0];
    }
}
