<?php
session_start();
if (isset($_SESSION["telephone"])) {
  include 'header.php';
  include 'connectdb.php';

  include 'upper-search.php'



?>
  
<!-- user product page -->

<div class="user-product" style="margin-top: 170px;">

      <?php
         $id = $_SESSION['id'];
         $sql = "SELECT * FROM product WHERE idz = $id";
         $stmt = $con->prepare($sql);
         $stmt->execute();
         $result = $stmt->fetchAll();
         if (empty($result)) {
           echo '<h1 class="alert alert-primary" style="margin: 50px auto;"> You Don\'t Have Annonce</h1>';
         }
         foreach ($result as $row) {
      ?>
      <div class="product-present" style="margin-top: 50px;">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="upload/images/<?php echo $row["images"]; ?>" class="d-block w-100" alt="no image 1">
                  </div>
                  <div class="carousel-item">
                    <img src="upload/images/<?php echo $row["images1"]; ?>" class="d-block w-100" alt="no image 2">
                  </div>
                  <div class="carousel-item">
                    <img src="upload/images/<?php echo $row["images2"]; ?>" class="d-block w-100" alt="no image 3">
                  </div>
                  <div class="carousel-item">
                    <img src="upload/images/<?php echo $row["images3"]; ?>" class="d-block w-100" alt="no image 4">
                  </div>
                  <div class="carousel-item">
                    <img src="upload/images/<?php echo $row["images4"]; ?>" class="d-block w-100" alt="no image 5">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-lg-4">
              <h2 style="font-weight: bold;"><?php echo $row["price"] . ' DT'.'<br>'; ?></h2>
              <h4><?php echo $row["title"] . '<br>'; ?></h4>
              <hr>
              <h3><i class="fas fa-map-marker-alt"></i> <?php echo $row["state"] . '<br>'; ?></h3>
              <h3><i class="fas fa-tags"></i><?php echo $row["category"] . '<br>'; ?></h3>
              <hr>
              <h4>Etat: <?php echo $row["etat"] . '<br>'; ?></h4>
              <h4>Brand: <?php echo $row["brand"] . '<br>'; ?></h4>
              <hr>
              <h3><?php echo $_SESSION["name"] . '<br>'; ?></h3>
              <h3>Telephone number: <?php echo $row["telephonez"] . '<br>'; ?></h3>
              <hr>
              <h3>Description</h3>
              <p><?php echo $row["description"] . '<br>'; ?></p>
              <form action="annonce-setting.php" method="post" style="margin-bottom: 10px;">
                <input type="hidden" name="id_prod" value="<?php echo $row["id_product"]; ?>">
                <input type="submit" name="" value="Modify product" class="btn btn-primary">
              </form>
              <form action="delete-product-page.php" method="post">
                <input type="hidden" name="id_prod" value="<?php echo $row["id_product"]; ?>">
                <input type="submit" name="" value="Delete Product" class="btn btn-danger confirm">
              </form>
            </div>
          </div>
        </div>

    <?php } ?>
    </div>

  <hr>






</div>

<!-- user product page -->



<?php

include 'footer.php';

}else {
  header("Location: homepage.php");
}

 ?>
