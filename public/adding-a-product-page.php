<?php

require_once "../common.php";

  $error = false;

  if($_SERVER["REQUEST_METHOD"] === "POST") {

    $input_types = $_POST["typesInput"];

    if(in_array($input_types, [1,2,3])) {

      $sku = $_POST["sku"];
      $name = $_POST["name"];
      $price = $_POST["price"];
      $type = $_POST["typesInput"];

      switch($type) {
        case 1:
        $product = new Dvd_disc($_POST["size"]);
        break;

        case 2:
        $product = new Book($_POST["weight"]);
        break;

        case 3:
        $product = new Furniture($_POST["height"], $_POST["width"], $_POST["lenght"]);
        break;
      }

      $productSku = $product->setSku($sku);
      $productName = $product->setName($name);
      $productPrice = $product->setPrice($price);

    try {
      VerifyProduct_Controller::verifyInformations([$sku, $name, $price]);

      $addItemController = new AddItem_controller($product);
      $addItemController->addItem();

    } catch (\Exception $e) {
      $error = $e->getMessage();
    }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- script -->
    <link rel="stylesheet" href="./../adding-a-product-page.css?v=<?php echo time(); ?>">
    <!-- javascript -->
    <script src="./../addProductHandler.js"></script>
  <title>Adding a Product Page</title>
</head>

<body>

<form action="adding-a-product-page.php" id="form_addingProduct" method="POST">

  <section class="navbar">
    <div class="container">
      <h1 class="title">Product Add</h1>

      <div class="buttons">
          <button type="submit" class="btn btn-outline-success">Save</button>
          <button type="reset" class="btn btn-outline-danger">Cancel</button>
      </div>
    </div>
  </section>


  <section class="main">
    <div class="container">
      <?php if($error !== false): ?>
        <div class="row">
          <div class="col-md-12">
            <p id="error" style="color:red"><?php echo $error ?></p>
          </div>
        </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-6">

          <div class="row sku">
            <div class="col-md-4">
              <label for="">SKU</label>
            </div>
            <div class="col-md-8">
              <input name="sku" type="text">
            </div>
          </div>
          <br>

          <div class="row sku">
            <div class="col-md-4">
              <label for="">Name</label>
            </div>
            <div class="col-md-8">
              <input name="name" type="text">
            </div>
          </div>
          <br>

          <div class="row sku">
            <div class="col-md-4">
              <label for="">Price ($)</label>
            </div>
            <div class="col-md-8">
              <input name="price" type="text">
            </div>
          </div>
          <br>



          <div class="row sku">
            <div class=" col-md-4">
                <p>Type Switchers</p>
            </div>
            <div class="col-md-8">
                <select id="input_types" aria-labelledby="dropdownMenuButton" name="typesInput" required>
                  <option value="">Type Switchers</option>
                  <option value="1" class="dropdown-item 1" id="item1" href="#">Size (in MB) for DVD-disc</option>
                  <option value="2" class="dropdown-item 2" id="item2" href="#">Weight (in Kg) for Book</option>
                  <option value="3" class="dropdown-item 3" id="item3" href="#">Dimensions (HxWxL) for Furniture</option>
                </select>
          </div>
          <br>


        <div class="option_1">
          <div class="row">
            <div class="col-md-4">
              <label class="label" for="">Size (in MB) for DVD-disc</label>
            </div>
            <div class="col-md-8">
              <input name="size" type="text" id="input_option_1">
            </div>

            <div class="col-md-12">
              <p>“Please, provide size”</p>
            </div>
          </div>
        </div>

        <div class="option_2">
          <div class="row">
            <div class="col-md-4">
              <label class="label" for="">Weight (in Kg) for Book</label>
            </div>
            <div class="col-md-8">
              <input name="weight" type="text" id="input_option_2">
            </div>

            <div class="col-md-12">
              <p>“Please, provide weight”</p>
            </div>
          </div>
        </div>

        <div class="option_3">
          <div class="row">

            <div class="col-md-4">
              <label for="">Height (CM)</label>
            </div>
            <div class="col-md-8">
              <input name="height" type="text">
            </div>
            <br>

            <div class="col-md-4">
              <label for="">Width (CM)</label>
            </div>
            <div class="col-md-8">
              <input name="width" type="text">
            </div>
            <br>

            <div class="col-md-4">
              <label for="">Lenght (CM)</label>
            </div>
            <div class="col-md-8">
              <input name="lenght" type="text">
            </div>

            <div class="col-md-12">
              <p>“Please, provide dimensions”</p>
            </div>

          </div>
        </div>
      </div>



      <div class="col-md-6"></div>


    </div>
    </div>
  </section>


  </form>


  <section class="footer">
    <div class="container">
      <p>Scandiweb Test assignment</p>
    </div>
  </section>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>
