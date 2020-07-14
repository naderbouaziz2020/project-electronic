
<?php

require 'connectdb.php';

if (isset($_POST['action'])) {
  $sql = "SELECT * FROM product WHERE brand != '' ";

  if (isset($_POST['brand'])) {
    $brand = implode("','", $_POST['brand']);
    $sql .= " AND brand IN('".$brand."')";
  }
  if (isset($_POST['etat'])) {
    $etat = implode("','", $_POST['etat']);
    $sql .= " AND etat IN('".$etat."')";
  }

  $result = $con->query($sql);
  $output = '';

  if ($result->num_rows > 0) {
    while ($row=$result->fetch_assoc()) {
    $output .= ' <div class="col-md-3 mb-2">
                   <div class="card-deck">
                     <form action="product_present.php" method="post">
                     <div class="card border-secondary">
                       <img src="upload/images/'.$row["images"].'" class="card-img-top">
                       <div class="card-body">
                          <h4 class="price-style">'.$row["price"] . " DT"; .'</h4>
                          <p style="font-weight: bold; color: #4d4d4d;">'.$row["title"].'</p>
                          <p class="telephone-style" style="font-weight: bold; color: #4d4d4d;">'."+216".$row["telephonez"].'</p>
                          <input type="hidden" name="id_prod" value="'.$row["id_product"].'">
                          <input type="submit" name="" value="view product" class="btn btn-primary">
                       </div>
                     </div>
                   </form>
                   </div>
                 </div>';
    }
  }else {
    $output = "<h3>No Products Found!</h3>";
  }
  echo $output;
}

 ?>
