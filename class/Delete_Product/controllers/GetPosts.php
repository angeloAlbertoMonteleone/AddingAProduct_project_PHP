<?php

require_once __DIR__ ."/../../DatabaseManager/DatabaseManager.php";
require_once __DIR__ ."/../models/Post.php";

class GetPosts
{

  private $databaseManager;

  function __construct()
  {
    $this->databaseManager = new DatabaseManager();
  }


  public function getPosts():array
  {
    $query = "SELECT * FROM products";

    $records = $this->databaseManager->executeSelectQuery($query, []);

    $output = [];

    foreach ($records as $key => $value) {
      $post = new Post();
      $post->setSku($value["sku"]);
      $post->setName($value["name"]);
      $post->setPrice($value["price"]);
      $post->setType($value["type"]);

      switch ($value["type"]) {
        case Dvd_disc::TYPE_DVD_DISC:
          $post->setMeasure($value["dvd_disc_mb"]);
          break;

        case Book::TYPE_BOOK:
          $post->setMeasure($value["book_kg"]);
          break;

        case Furniture::TYPE_FURNITURE:
          $post->setMeasure(sprintf($value["furniture_height"],$value["furniture_width"],$value["furniture_lenght"]));
          break;
      }
      $output[] = $post;
    }
    return $output;
  }
}
