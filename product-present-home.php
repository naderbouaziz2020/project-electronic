<?php
session_start();
if (isset($_SESSION["telephone"])) {

  header("Location: product_present.php");

}else{

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
       <a class="navbar-brand" href="homepage.php">Nader</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSu" aria-controls="navbarSu" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSu">
         <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
         </form>
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
             <a class="nav-link" href="signin.php"><i class="fas fa-user-alt"></i>Sign In</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="signin.php"><i class="fas fa-flag"></i>Create Annonce</a>
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
           <a class="nav-link active" href="homepage.php"><i class="fas fa-home"></i>Home<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#"><i class="fas fa-mobile-alt"></i>Telephone
          <span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#"><i class="fas fa-laptop"></i>Computer<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#"><i class="fas fa-gamepad"></i>Gaming<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#"><i class="fas fa-tv"></i>TV<span class="span-bar">|</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#"><i class="fas fa-headphones"></i>Sound <span class="span-bar">|</span></a>
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
   <?php
   $id_prod = $_POST["id_prod"];
   $stmt = $con->prepare("SELECT * FROM product WHERE id_product = ? ");
   $stmt->execute(array($id_prod));
   $row = $stmt->fetch();
   $count = $stmt->rowCount();

   if ($stmt->rowCount() > 0) {
   ?>
   <div class="product-present" style="margin-top: 50px;">
     <div class="container">
       <div class="row">
         <div class="col-lg-8">
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
             </ol>
             <div class="carousel-inner">
               <div class="carousel-item active">
                 <img src="upload/images/<?php echo $row["images"]; ?>" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                 <img src="upload/images/<?php echo $row["images1"]; ?>" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                 <img src="..." class="d-block w-100" alt="...">
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
           <h2><?php echo $row["price"] . ' DT'.'<br>'; ?></h2>
           <h4><?php echo $row["title"] . '<br>'; ?></h4>
           <hr>
           <h3><i class="fas fa-map-marker-alt"></i> <?php echo $row["state"] . '<br>'; ?></h3>
           <h3><?php echo $row["category"] . '<br>'; ?></h3>
           <hr>
           <h4>Etat: <?php echo $row["etat"] . '<br>'; ?></h4>
           <h4>Brand: <?php echo $row["brand"] . '<br>'; ?></h4>
           <hr>
           <h3><?php echo $row["namez"] . '<br>'; ?></h3>
           <h3>Telephone number: <?php echo $row["telephonez"] . '<br>'; ?></h3>
           <hr>
           <h3>Description</h3>
           <p><?php echo $row["description"] . '<br>'; ?></p>
         </div>
       </div>
     </div>
   </div>
   <?php echo $row["id_product"]; ?>
   <?php

include 'footer.php';
}
}
?>
