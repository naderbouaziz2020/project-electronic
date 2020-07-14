<?php
session_start();
if (isset($_SESSION["telephone"])) {

  header("Location: product_present.php");

}else{

  include 'header.php';
  include 'connectdb.php';

  include 'upper-home.php';
   ?>

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
             <div class="carousel-inner">
               <div class="carousel-item active">
                 <img src="upload/images/<?php echo $row["images"]; ?>" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                 <img src="upload/images/<?php echo $row["images1"]; ?>" class="d-block w-100" alt="No Images Found!">
               </div>
               <div class="carousel-item">
                 <img src="upload/images/<?php echo $row["images2"]; ?>" class="d-block w-100" alt="No Images Found!">
               </div>
               <div class="carousel-item">
                 <img src="upload/images/<?php echo $row["images3"]; ?>" class="d-block w-100" alt="No Images Found!">
               </div>
               <div class="carousel-item">
                 <img src="upload/images/<?php echo $row["images4"]; ?>" class="d-block w-100" alt="No Images Found!">
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
           <h2 style="font-weight: bold;margin-top: 25px;"><?php echo $row["price"] . ' DT'.'<br>'; ?></h2>
           <h4><?php echo $row["title"] . '<br>'; ?></h4>
           <hr>
           <h3 style="font-size: 25px; color: #575757;"><i class="fas fa-map-marker-alt"></i> <?php echo $row["state"] . '<br>'; ?></h3>
           <h3 style="font-size: 25px; color: #575757;"><i class="fas fa-tags"></i><?php echo $row["category"] . '<br>'; ?></h3>
           <hr>
           <h4>Etat: <?php echo $row["etat"] . '<br>'; ?></h4>
           <h4>Brand: <?php echo $row["brand"] . '<br>'; ?></h4>
           <hr>
           <h3 style="color: #575757;"><?php echo $row["namez"] . '<br>'; ?></h3>
           <h3 style="color: #575757;"><i class="fas fa-phone-square-alt"></i><?php echo $row["telephonez"] . '<br>'; ?></h3>
           <hr>
           <h3>Description</h3>
           <p><?php echo $row["description"] . '<br>'; ?></p>
         </div>
       </div>
     </div>
   </div>
  
   <?php

include 'footer.php';
}
}
?>
