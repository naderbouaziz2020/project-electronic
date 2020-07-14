
   <!-- upper bar -->
  <div class="fixed-top">
   <div class="upper-bar">
     <div class="container">
       <div class="row">
         <div class="col">
           <i class="fas fa-phone-alt"></i>Aide & Contact
         </div>
         <div class="col text-right">
           <i class="fas fa-shopping-cart"></i>Vendre sur MyElectro
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
           <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
           <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
         </form>
         <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-alt"></i><?php echo $_SESSION["name"]; ?>
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="update.php">Paramètre du compte</a>
               <a class="dropdown-item" href="user-product.php">Modifier l'annonce </a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="sign-out.php">Déconnexion</a>
             </div>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="create-annonce.php"><i class="fas fa-flag"></i>Créer une annonce</a>
           </li>
         </ul>
       </div>
     </nav>
   </div>
  </div>

   <!-- end search bar -->
