
  <!-- start show & filter product -->
<div class="filter-product">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2">
        <h5>Filter Product</h5>
        <hr>
        <h6>Select State</h6>
        <select class="" name="">
          <option value=""></option>

          <?php
           $sql = "SELECT DISTINCT state FROM product ORDER BY state";
           $stmt = $con->prepare($sql);
           $stmt->execute();
           $result = $stmt->fetchAll();
           foreach ($result as $row) {
          ?>
            <option value="<?php echo $row["state"]; ?>"><?php echo $row["state"]; ?></option>
           <?php } ?>
        </select>
        <hr>
        <h6>Select Gategory</h6>
        <ul class="list-unstyled">
          <li><a href="#"><i class="fas fa-mobile-alt"></i>Telephone</a></li>
          <li><a href="#"><i class="fas fa-laptop"></i>Computer</a></li>
          <li><a href="#"><i class="fas fa-gamepad"></i>Gaming accessories</a></li>
          <li><a href="#"><i class="fas fa-home"></i>Home appliance</a></li>
          <li><a href="#"><i class="fas fa-laptop-medical"></i>Computer science</a></li>
          <li><a href="#"><i class="fas fa-tv"></i>TV</a></li>
          <li><a href="#"><i class="fas fa-camera"></i>Camera</a></li>
          <li><a href="#"><i class="fas fa-headphones"></i>Sound</a></li>
          <li><a href="#"><i class="fas fa-window-maximize"></i>Printer</a></li>
          <li><a href="#"><i class="fas fa-car-battery"></i>Electronic card</a></li>
          <li><a href="#"><i class="fas fa-keyboard"></i>Computer accessories</a></li>
          <li><a href="#"><i class="fas fa-tty"></i>Telephone accessories</a></li>
          <li><a href="#"><i class="fas fa-laptop-house"></i>Game console</a></li>
          <li><a href="#"><i class="fas fa-laptop"></i>Laptop</a></li>
          <li><a href="#"><i class="fas fa-satellite-dish"></i>Cable</a></li>
          <li><a href="#"><i class="fas fa-car-battery"></i>Electronic component</a></li>
          <li><a href="#"><i class="fas fa-laptop-house"></i>Home & Garden</a></li>
        </ul>
        <hr>
        <h6>Select Brand</h6>
        <ul class="list-group">
          <?php
           $sql = "SELECT DISTINCT brand FROM product ORDER BY brand";
           $stmt = $con->prepare($sql);
           $stmt->execute();
           $result = $stmt->fetchAll();
           foreach ($result as $row) {
          ?>
             <li class="list-group-item">
               <div class="form-check">
                 <label class="form-check-label">
                   <input type="checkbox" class="form-check-input product_check" value="<?php echo $row["brand"]; ?>" id="brand"><?php echo $row["brand"]; ?>
                 </label>
               </div>
             </li>
           <?php } ?>
        </ul>
        <hr>
        <hr>
        <h6>Select Etat</h6>
        <ul class="list-group">
          <?php
           $sql = "SELECT DISTINCT etat FROM product ORDER BY etat";
           $stmt = $con->prepare($sql);
           $stmt->execute();
           $result = $stmt->fetchAll();
           foreach ($result as $row) {
          ?>
             <li class="list-group-item">
               <div class="form-check">
                 <label class="form-check-label">
                   <input type="checkbox" class="form-check-input product_check" value="<?php echo $row["etat"]; ?>" id="etat"><?php echo $row["etat"]; ?>
                 </label>
               </div>
             </li>
           <?php } ?>
        </ul>
        <hr>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <?php
             $sql = "SELECT * FROM product";
             $stmt = $con->prepare($sql);
             $stmt->execute();
             $result = $stmt->fetchAll();
             foreach ($result as $row) {
          ?>
          <div class="col-md-3 mb-2">
            <div class="card-deck">
              <form action="product_present.php" method="post">
              <div class="card border-secondary">
                <img src="upload/images/<?php echo $row["images"]; ?>" class="card-img-top">
                <div class="card-body">
                   <h4><?php echo $row["price"] . " DT"; ?></h4>
                   <p><?php echo $row["title"]; ?></p>
                   <p><?php echo "+216".$row["telephonez"]; ?></p>
                   <p><?php echo $row["id_product"]; ?></p>
                   <input type="hidden" name="id_prod" value="<?php echo $row["id_product"]; ?>">
                   <input type="submit" name="" value="view product" class="btn btn-primary">
                </div>
              </div>

            </form>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- start show & filter product -->
