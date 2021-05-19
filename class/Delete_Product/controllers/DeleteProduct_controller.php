<?php

require_once __DIR__ ."/../../DatabaseManager.php";

class DeleteItem_controller
{
  private $databaseManager;

  function __construct()
  {
    $this->databaseManager = new DatabaseManager();
  }


  public function removeProduct($sku):void
  {
    $query = "DELETE FROM products WHERE sku = :sku";

    $statement = $this->databaseManager->executeQuery($query,
    ["sku" => $sku]);

    $this->databaseManager->redirect();
  }
}
