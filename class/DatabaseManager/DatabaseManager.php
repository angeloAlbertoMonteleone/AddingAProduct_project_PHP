<?php

/**
 *
 */
class DatabaseManager
{

  public function getConnection()
  {
    try {
      $connection = new PDO('mysql:host=localhost;dbname=posts', "root", "root");
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    return $connection;
  }



  public function executeSelectQuery(string $query, array $params = [])
  {
    $connection = $this->getConnection();

     try {
         $statement = $connection->prepare($query);
         $statement->execute($params);
     } catch (PDOException $exception) {
         echo "Error!: " . $exception->getMessage();
         die();
     }

     return $statement->fetchAll(PDO::FETCH_ASSOC);
  }





  public function executeQuery(string $query, array $params = []): void
  {
      $connection = $this->getConnection();

      try {
          $statement = $connection->prepare($query);
          $statement->execute($params);
      } catch (PDOException $exception) {
          echo "Error!: " . $exception->getMessage();
          die();
      }
  }





  public function redirect() {
    header("location: ./product-list-page.php");
  }

}
