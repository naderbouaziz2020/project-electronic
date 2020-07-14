<?php
session_start();
if (isset($_SESSION["telephone"])) {

  header("Location: product_present.php");

}else{
$title = "TV";
  include 'header.php';
  include 'connectdb.php';

  include 'upper-home.php';
   ?>

   <!-- start slider -->

   <div class="slider">
     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img src="images/img1.jpg" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
           <img src="images/img2.jpg" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
           <img src="images/img3.jpg" class="d-block w-100" alt="...">
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

   <!-- end slider -->


        <!-- start show & filter product -->
      <div class="filter-product">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2">
              <h5>Filter Product</h5>
              <hr>
              <h6>Select State</h6>
              <select class="" name="">
                <option value=""></option>

                <?php
                 $sql = "SELECT DISTINCT state FROM product ORDER BY state";
                 $stmt = $con->prepare($sql);
                 $stmt->execute();
                 $result = $stmt->fetchAll();
                 foreach ($result as $row) {
                ?>
                  <option value="<?php echo $row["state"]; ?>"><?php echo $row["state"]; ?></option>
                 <?php } ?>
              </select>
              <hr>
              <h6>Select Gategory</h6>
              <ul class="list-unstyled">
                <li><a href="telephone-home.php"><i class="fas fa-mobile-alt"></i>Telephone</a></li>
                <li><a href="computer-home.php"><i class="fas fa-laptop"></i>Computer</a></li>
                <li><a href="game-home.php"><i class="fas fa-gamepad"></i>Gaming accessories</a></li>
                <li><a href="#"><i class="fas fa-home"></i>Home appliance</a></li>
                <li><a href="#"><i class="fas fa-laptop-medical"></i>Computer science</a></li>
                <li><a href="tv-home.php"><i class="fas fa-tv"></i>TV</a></li>
                <li><a href="#"><i class="fas fa-camera"></i>Camera</a></li>
                <li><a href="sound-page.php"><i class="fas fa-headphones"></i>Sound</a></li>
                <li><a href="#"><i class="fas fa-window-maximize"></i>Printer</a></li>
                <li><a href="#"><i class="fas fa-car-battery"></i>Electronic card</a></li>
                <li><a href="#"><i class="fas fa-keyboard"></i>Computer accessories</a></li>
                <li><a href="#"><i class="fas fa-tty"></i>Telephone accessories</a></li>
                <li><a href="#"><i class="fas fa-laptop-house"></i>Game console</a></li>
                <li><a href="#"><i class="fas fa-laptop"></i>Laptop</a></li>
                <li><a href="#"><i class="fas fa-satellite-dish"></i>Cable</a></li>
                <li><a href="#"><i class="fas fa-car-battery"></i>Electronic component</a></li>
                <li><a href="#"><i class="fas fa-laptop-house"></i>Home & Garden</a></li>
              </ul>
              <hr>
              <h6>Select Brand</h6>
              <ul class="list-group">
                <?php
                 $sql = "SELECT DISTINCT brand FROM product ORDER BY brand";
                 $stmt = $con->prepare($sql);
                 $stmt->execute();
                 $result = $stmt->fetchAll();
                 foreach ($result as $row) {
                ?>
                   <li class="list-group-item">
                     <div class="form-check">
                       <label class="form-check-label">
                         <input type="checkbox" class="form-check-input product_check" value="<?php echo $row["brand"]; ?>" id="brand"><?php echo $row["brand"]; ?>
                       </label>
                     </div>
                   </li>
                 <?php } ?>
              </ul>
              <hr>
              <hr>
              <h6>Select Etat</h6>
              <ul class="list-group">
                <?php
                 $sql = "SELECT DISTINCT etat FROM product ORDER BY etat";
                 $stmt = $con->prepare($sql);
                 $stmt->execute();
                 $result = $stmt->fetchAll();
                 foreach ($result as $row) {
                ?>
                   <li class="list-group-item">
                     <div class="form-check">
                       <label class="form-check-label">
                         <input type="checkbox" class="form-check-input product_check" value="<?php echo $row["etat"]; ?>" id="etat"><?php echo $row["etat"]; ?>
                       </label>
                     </div>
                   </li>
                 <?php } ?>
              </ul>
              <hr>
            </div>
            <div class="col-lg-9">
              <div class="row">
                <?php
                   $sql = "SELECT * FROM product WHERE category = 'TV'";
                   $stmt = $con->prepare($sql);
                   $stmt->execute();
                   $result = $stmt->fetchAll();
                   foreach ($result as $row) {
                ?>
                <div class="col-md-3 mb-2">
                  <div class="card-deck">
                    <form action="product-present-home.php" method="post">
                    <div class="card border-secondary">
                      <img src="upload/images/<?php echo $row["images"]; ?>" class="card-img-top">
                      <div class="card-body">
                         <h4 class="price-style"><?php echo $row["price"] . " DT"; ?></h4>
                         <p><?php echo $row["title"]; ?></p>
                         <p class="telephone-style"><?php echo "+216".$row["telephonez"]; ?></p>
                         <p><?php echo $row["id_product"]; ?></p>
                         <input type="hidden" name="id_prod" value="<?php echo $row["id_product"]; ?>">
                         <input type="submit" name="" value="view product" class="btn btn-primary">
                      </div>
                    </div>

                  </form>
                  </div>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- start show & filter product -->

        <?php
        include 'footer.php';
      }
      ?>
