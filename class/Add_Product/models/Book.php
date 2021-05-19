<?php

require_once "Product.php";
require_once __DIR__ ."/../repositories/BookRepository.php";


class Book extends Product
{
  private $book_kg;
  private $bookRepository;
  public const TYPE_BOOK = "BOOK";
  public const MEASURE_TYPE = "weight";


  function __construct($book_kg)
  {
    $this->book_kg = $book_kg;
    $this->bookRepository = new BookRepository();
  }

  public function getBook_kg() {
    return $this->book_kg;
  }

  public function setProductType():void
  {
   VerifyProduct_Controller::verifyProduct([$this->book_kg], self::MEASURE_TYPE);
   $this->setType(self::TYPE_BOOK);
  }

  public function getArrayFromQuery($product):array
  {
    return $this->bookRepository->executeCreatedQuery($product);
  }


}
