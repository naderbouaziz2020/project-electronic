<?php
session_start();
if (isset($_SESSION["telephone"])) {
  header("Location: dashboard.php");
}
$title = "Sign-In";
include 'header.php';

include 'connectdb.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $Telephone = $_POST["telephone"];
  $password = $_POST["pass"];
  $hashedPass = sha1($password);

  if (empty($Telephone)) {
    $msg = "This field is required";
  }


  $stmt = $con->prepare("SELECT id, name, telephone, password FROM myusers WHERE telephone = ? AND password = ?");
  $stmt->execute(array($Telephone, $password));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();

  if ($count > 0 ) {
    $_SESSION["telephone"] = $Telephone;
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    header("Location: dashboard.php");
    exit();
  }else{
    ?>
    <div class="alert alert-danger ert" role="alert">
      Sorry, try again!
    </div>
<?php
  }
}

?>

    <div class="sign-in">
      <h2>Se connecter</h2>
      <form class="" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
        <label for="">Numéro de téléphone :</label>
        <input class="form-control" type="text" name="telephone" required="required">
        <label for="">Mot de passe :</label>
        <input class="form-control" type="password" name="pass" required="required">
        <input class="btn btn-primary btn-block" type="submit" value="Se connecter">
      </form>
      <hr>
      <a href="registre.php">Créer un compte.</a>
    </div>

<?php
include 'footer.php';
?>
