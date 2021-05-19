<?php


class AddProduct_controller
{

  private $product;
  private $databaseManager;

  function __construct($product)
  {
    $this->product = $product;
    $this->databaseManager = new DatabaseManager();
  }


  public function addProduct() {

    $this->product->setProductType();

    $this->product->getArrayFromQuery($this->product);

    $redirect = $this->databaseManager->redirect();
  }

}
