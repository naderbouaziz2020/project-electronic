<?php
$title = "Registre";
include 'header.php';

include 'connectdb.php';



if($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $telephone = $_POST["telephone"];
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

  if (! is_numeric($telephone)) {
    $telephoneMsg = "Enter a valid telephone number";
  }

  if (empty($telephone)) {
    $telephoneMsg = "Enter your telephone";
  }

  if (strlen($password) < 6 ) {
    $passMsg = "Passwords must be at least 6 characters.";
  }

  if (empty($password)) {
    $passMsg = "Enter your password";
  }



  if (empty($nameMsg) && empty($emailMsg) && empty($telephoneMsg) && empty($passMsg)) {


    $sql = "INSERT INTO myusers (name, email, telephone, password) VALUES (?,?,?,?)";
    $stmt = $con->prepare($sql);

    $result = $stmt->execute([$name, $email, $telephone, $password]);

    if ($result) {
      $_SESSION["telephone"] = $Telephone;
      $_SESSION["id"] = $row["id"];
      $_SESSION["name"] = $row["name"];
      header("Location: signin.php");
      exit();
    }
  }

}



?>


    <div class="registre-page">
      <h2 class="text-center">Créer un compte</h2>
      <form class="" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
        <label for="">Nom <span class="start">*</span></label>
        <input class="form-control" type="text" name="name">
        <p class="errorr"><?php echo $nameMsg; ?></p>
        <label for="">Email <span class="start">*</span></label>
        <input class="form-control" type="email" name="email">
        <p class="errorr"><?php echo $emailMsg; ?></p>
        <label for="">Numéro de téléphone <span class="start">*</span></label>
        <input class="form-control" type="text" name="telephone">
        <p class="errorr"><?php echo $telephoneMsg; ?></p>
        <label for="">Mot de passe <span class="start">*</span></label>
        <div class="input-box">
          <span>
            <i class="fas fa-eye" id="eye" onclick="myFunction()"></i>
          </span>
          <input class="form-control" type="password" name="password" id="myInput">
          <p class="errorr"><?php echo $passMsg; ?></p>
        </div>
        <small id="passwordHelpInline" class="text-muted">Les mots de passe doivent contenir au moins 6 caractères.</small>
        <input class="btn btn-primary btn-block" type="submit" name="create-account" value="Créer un compte">
      </form>
      <hr>
      <p>Vous avez déjà un compte? <a href="signin.php">Se connecter</a> </p>
    </div>


<?php
include 'footer.php';
?>
