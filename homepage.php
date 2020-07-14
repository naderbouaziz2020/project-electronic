<?php
session_start();
if (isset($_SESSION["telephone"])) {
  header("Location: dashboard.php");
}else{
$title = "Home page";
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

      <!-- start show & filter product -->
    <div class="filter-product">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <h5>Filtre de produit</h5>
            <hr>
            <h6>Sélectionnez l'état</h6>
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
            <h6>Choisir une catégorie</h6>
            <ul class="list-unstyled">
              <li><a href="telephone-page.php"><i class="fas fa-mobile-alt"></i>Smartphone</a></li>
              <li><a href="computer-page.php"><i class="fas fa-laptop"></i>Ordinateur</a></li>
              <li><a href="game-page.php"><i class="fas fa-gamepad"></i>Accessoires de jeux</a></li>
              <li><a href="#"><i class="fas fa-home"></i>Électroménager</a></li>
              <li><a href="#"><i class="fas fa-laptop-medical"></i>L'informatique</a></li>
              <li><a href="tv-page.php"><i class="fas fa-tv"></i>TV</a></li>
              <li><a href="#"><i class="fas fa-camera"></i>Caméra</a></li>
              <li><a href="sound-page.php"><i class="fas fa-headphones"></i>Son</a></li>
              <li><a href="#"><i class="fas fa-window-maximize"></i>Imprimante</a></li>
              <li><a href="#"><i class="fas fa-car-battery"></i>Carte électronique</a></li>
              <li><a href="#"><i class="fas fa-keyboard"></i>Accessoires de l'ordinateur</a></li>
              <li><a href="#"><i class="fas fa-tty"></i>Accessoires téléphoniques</a></li>
              <li><a href="#"><i class="fas fa-laptop-house"></i>Console de jeu</a></li>
              <li><a href="#"><i class="fas fa-laptop"></i>Ordinateur portable</a></li>
              <li><a href="#"><i class="fas fa-satellite-dish"></i>Câble</a></li>
              <li><a href="#"><i class="fas fa-car-battery"></i>Composant élèctronique</a></li>
              <li><a href="#"><i class="fas fa-laptop-house"></i>Maison & Jardin</a></li>
            </ul>
            <hr>
            <h6>Sélectionnez la marque</h6>
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
                 $sql = "SELECT * FROM product";
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
                       <p style="font-weight: bold; color: #4d4d4d; margin-bottom: 7px;"><?php echo $row["title"]; ?></p>
                       <p class="telephone-style"  style="font-weight: bold; color: #4d4d4d;"><?php echo "+216".$row["telephonez"]; ?></p>
                       <p style="font-weight: bold; color: #4d4d4d;"><?php echo "Etat: ". $row["etat"]; ?></p>
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
 <!-- start show & filter product -->
 <?php
 //include 'filter-product.php';

 include 'connectdb.php';
  ?>

 <?php
 include 'footer.php';
 }
  ?>
