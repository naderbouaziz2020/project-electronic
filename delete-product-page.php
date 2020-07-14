<?php
session_start();
if (isset($_SESSION["telephone"])) {

  include 'header.php';
  include 'connectdb.php';

  $id_prod = $_POST['id_prod'];
  $stmt = $con->prepare("SELECT * FROM product WHERE id_product = ?");
  $stmt->execute(array($id_prod));
  $count = $stmt->rowCount();
  if ($stmt->rowCount()> 0 ) {
    $stmt = $con->prepare("DELETE FROM product WHERE id_product = ?");
    $stmt->execute(array($id_prod));
    header("Location: user-product.php");
  }else {
    header("Location: homepage.php");
  }
  ?>


<?php
 include 'footer.php';

}else {

  header("Location: homepage.php");
}

 ?>
