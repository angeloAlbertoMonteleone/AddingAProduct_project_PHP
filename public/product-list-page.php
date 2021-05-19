<?php
  require_once "./../common.php";

  $productsArray = $postManager->getPosts();

  if($_SERVER["REQUEST_METHOD"] === "POST") {

      $checkbox = $_POST["checkbox"];

      $deleteItemController = new DeleteItem_controller();
      $deleteItemController->deleteItem($checkbox);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- script -->
  <link rel="stylesheet" href="./../product-list-page.css?v=<?php echo time(); ?>">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- javascript -->
  <script src="./../productListHandler.js"></script>

  <title>Product list page</title>
</head>

<body>

  <form id="form" action="product-list-page.php" method="POST">

  <section class="navbar">
    <div class="container">
      <h1 class="title">Product List</h1>

      <div class="buttons">
          <button type="button" class="btn btn-outline-success">ADD</button>
          <button type="submit" class="btn btn-outline-danger">MASS DELETE</button>
      </div>
    </div>
  </section>

  <section class="main">
    <div class="container">
      <div class="product-list">
        <?php foreach ($productsArray as $product): ?>

            <div class="product" id="<?php echo $product->getSku() ?>">
              <p><?php echo $product->getSku() ?></p>
              <p><?php echo $product->getName() ?></p>
              <p><?php echo $product->getPrice() . "$" ?></p>
              <?php if ($product->getType() === "DVD_DISC"): ?>
              <p><?php echo "Size: ". $product->getMeasure() ?></p>
              <?php elseif ($product->getType() === "BOOK"): ?>
               <p><?php echo "Weight: ". $product->getMeasure() ?></p>
              <?php elseif ($product->getType() === "FURNITURE"): ?>
               <p><?php echo "Dimensions: ". $product->getMeasure() ?></p>
              <?php endif ?>

              <div class="checkbox">
                <input type="checkbox" name="checkbox" id="check_input" value="<?php echo $product->getSku(); ?>">
              </div>
            </div>

        <?php endforeach ?>
      </div>
    </div>
  </section>


  <section class="footer">
    <div class="container">
      <p>Scandiweb Test assignment</p>
    </div>
  </section>

</form>

</body>

</html>
