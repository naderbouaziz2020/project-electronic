<?php
session_start();
if (!isset($_SESSION["telephone"])) {
  header("Location: homepage.php");
}

include 'header.php';
 ?>

 <!-- upper bar -->
<div class="fixed-top">
 <div class="upper-bar">
   <div class="container">
     <div class="row">
       <div class="col">
         Help & Contact
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
             <?php echo $_SESSION["name"]; ?>
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="update.php">Account Setting</a>
             <a class="dropdown-item" href="#">Annonce Edit</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="sign-out.php">Sign Out</a>
           </div>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="create-annonce.php">Create Annonce</a>
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
         <a class="nav-link active" href="#">Home<span class="span-bar">|</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Informatique
        <span class="span-bar">|</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Telephone<span class="span-bar">|</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Gaming<span class="span-bar">|</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">TV & Photo <span class="span-bar">|</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Accessoires <span class="span-bar">|</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Bureautique <span class="span-bar">|</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Imprission</a>
       </li>
     </ul>
   </div>
 </div>


 <!-- end product bar -->

 <!-- start slider -->

 <div class="slider">
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner">
       <div class="carousel-item carousel-one active">
       </div>
       <div class="carousel-item carousel-two">
       </div>
       <div class="carousel-item carousel-three">
       </div>
     </div>
   </div>
 </div>

 <!-- end slider -->

 <?php
 echo $_SESSION["telephone"] . $_SESSION["id"] . $_SESSION["name"];
 include 'connectdb.php';
  ?>

 <?php
 include 'footer.php';
  ?>
