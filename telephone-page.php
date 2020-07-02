<?php
session_start();
if (isset($_SESSION["telephone"])) {
  include 'header.php';
  include 'connectdb.php';
?>

   <!-- upper bar -->
  <div class="fixed-top">
   <div class="upper-bar">
     <div class="container">
       <div class="row">
         <div class="col">
           <i class="fas fa-phone-alt"></i>Help & Contact
         </div>
         <div class="col text-right">
           Sell on MyElectro
         </div>
       </div>
     </div>
   </div>

   <!-- upper bar -->

   <!-- start search bar -->

   <div class="search-bar">
     <nav class="navbar navbar-expand-lg navbar-light">
       <a class="navbar-brand" href="dashboard.php">Nader</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSu" aria-controls="navbarSu" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSu">
         <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
         </form>
         <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-alt"></i><?php echo $_SESSION["name"]; ?>
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="update.php">Account Setting</a>
               <a class="dropdown-item" href="#">Annonce Edit</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="sign-out.php">Sign Out</a>
             </div>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="create-annonce.php"><i class="fas fa-flag"></i>Create Annonce</a>
           </li>
         </ul>
       </div>
     </nav>
   </div>
  </div>

   <!-- end search bar -->

   <!-- start product bar -->

   <div class="product-bar">
     <div class="container">
       <ul class="nav justify-content-center">
         <li class="nav-item">
           <a class="nav-link active" href="dashboard.php"><i class="fas fa-home"></i>Home<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="telephone-page.php"><i class="fas fa-mobile-alt"></i>Telephone
          <span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="computer-page.php"><i class="fas fa-laptop"></i>Computer<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="game-page.php"><i class="fas fa-gamepad"></i>Gaming<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="tv-page.php"><i class="fas fa-tv"></i>TV<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="sound-page.php"><i class="fas fa-headphones"></i>Sound <span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#"><i class="fas fa-car-battery"></i>Electronic component <span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#"><i class="fas fa-camera"></i>Camera </a>
         </li>
       </ul>
     </div>
   </div>

   <!-- end product bar -->

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
           <img src="images/image2.jpg" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
           <img src="images/image3.jpg" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
           <img src="images/nnn.jpg" class="d-block w-100" alt="...">
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
             <li><a href="telephone-page.php"><i class="fas fa-mobile-alt"></i>Telephone</a></li>
             <li><a href="computer-page.php"><i class="fas fa-laptop"></i>Computer</a></li>
             <li><a href="game-page.php"><i class="fas fa-gamepad"></i>Gaming accessories</a></li>
             <li><a href="#"><i class="fas fa-home"></i>Home appliance</a></li>
             <li><a href="#"><i class="fas fa-laptop-medical"></i>Computer science</a></li>
             <li><a href="tv-page.php"><i class="fas fa-tv"></i>TV</a></li>
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
                $sql = "SELECT * FROM product WHERE category = 'telephone'";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach ($result as $row) {
             ?>
             <div class="col-md-3 mb-2">
               <div class="card-deck">
                 <form action="product_present.php" method="post">
                 <div class="card border-secondary">
                   <img src="upload/images/<?php echo $row["images"]; ?>" class="card-img-top">
                   <div class="card-body">
                      <h4><?php echo $row["price"] . " DT"; ?></h4>
                      <p><?php echo $row["title"]; ?></p>
                      <p><?php echo "+216".$row["telephonez"]; ?></p>
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

  //include 'filter-product.php';

   echo $_SESSION["telephone"] . $_SESSION["id"] . $_SESSION["name"];


   include 'footer.php';

}else{

  header("Location: homepage.php");

}
?>
