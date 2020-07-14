<?php
session_start();
if (isset($_SESSION["telephone"])) {
  include 'header.php';
  include 'connectdb.php';

  $id = $_SESSION["id"];
  $stmt = $con->prepare("SELECT * FROM myusers WHERE id = ? ");
  $stmt->execute(array($id));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();

  if ($stmt->rowCount() > 0) {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $id = $_POST["id"];
      $name = $_POST["name"];
      $email = $_POST["email"];
      $tel = $_POST["telephone"];
      $password = $_POST["password"];

      if (strlen($name) > 30) {
        $nameMsg = "Name must be 30 max";
      }

      if (empty($name)) {
        $nameMsg = "Enter your name";
      }


      if (empty($email)) {
        $emailMsg = "Enter your email";
      }

      if (! is_numeric($tel)) {
        $telephoneMsg = "Enter a valid telephone number";
      }

      if (empty($tel)) {
        $telephoneMsg = "Enter your telephone";
      }

      if (strlen($password) < 6 ) {
        $passMsg = "Passwords must be at least 6 characters.";
      }

      if (empty($password)) {
        $passMsg = "Enter your password";
      }

      if (empty($nameMsg) && empty($emailMsg) && empty($telephoneMsg) && empty($passMsg)) {


        $stmt = $con->prepare("UPDATE myusers SET name = ?, telephone = ?, email = ?, password = ? WHERE id = ?");
        $stmt->execute(array($name, $tel, $email, $password, $id));
        $_SESSION["name"] = $name;
        header("Location: update.php");
      }
    }

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
          <i class="fas fa-shopping-cart"></i>Sell on MyElectro
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
              <a class="dropdown-item" href="user-product.php">Annonce Edit</a>
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
      <div class="registre-page">
        <h2 class="text-center">Edit Account</h2>
        <form class="" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
          <input type="hidden" name="id" value="<?php echo $id ; ?>">
          <label for="">Name</label>
          <input class="form-control" type="text" name="name" value="<?php echo $row["name"]; ?>">
          <p class="errorr"><?php echo $nameMsg; ?></p>
          <label for="">Email</label>
          <input class="form-control" type="email" name="email" value="<?php echo $row["email"]; ?>">
          <p class="errorr"><?php echo $emailMsg; ?></p>
          <label for="">Telephone</label>
          <input class="form-control" type="text" name="telephone" value="<?php echo $row["telephone"]; ?>">
          <p class="errorr"><?php echo $telephoneMsg; ?></p>
          <label for="">Password</label>
          <div class="input-box">
            <span>
              <i class="fas fa-eye" id="eye" onclick="myFunction()"></i>
            </span>
            <input class="form-control" value="<?php echo $row["password"]; ?>" type="password" name="password" id="myInput">
            <p class="errorr"><?php echo $passMsg; ?></p>
          </div>
          <small id="passwordHelpInline" class="text-muted">Passwords must be at least 6 characters.</small>
          <input class="btn btn-primary btn-block" type="submit" name="create-account" value="Edit account">
        </form>
      </div>
  <?php

  }

}else{
  header("Location: homepage.php");
}
include 'footer.php';
?>
