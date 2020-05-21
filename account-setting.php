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
