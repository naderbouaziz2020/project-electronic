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

    include 'upper-search.php';
?>
  

  <!-- my information -->
  <div class="update">
    <h2>Account information</h2>

<table>
  <tr>
    <td>Name</td>
    <td><?php echo $row["name"]; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row["email"]; ?></td>
  </tr>
  <tr>
    <td>Telephone</td>
    <td><?php echo $row["telephone"]; ?></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>*******</td>
  </tr>
</table>
    <a href="account-setting.php">Modifier</a>
  </div>


  <!-- my information -->


<?php

include 'footer.php';
}else {
  header("Location: homepage.php");
}
}else {
  header("Location: homepage.php");
}

 ?>
