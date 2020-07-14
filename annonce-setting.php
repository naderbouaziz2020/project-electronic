<?php
session_start();
if (isset($_SESSION["telephone"])) {
  $title = "Create Annonce";
  include 'header.php';
  include 'connectdb.php';

  echo $_SESSION["telephone"] . $_SESSION["id"] . $_SESSION["name"];

  $id = $_POST["id_prod"];
  $stmt = $con->prepare("SELECT * FROM product WHERE id_product = ? ");
  $stmt->execute(array($id));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();

  if ($stmt->rowCount() > 0) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $imagesName = $_FILES["images"]["name"];
      $imagesSize = $_FILES["images"]["size"];
      $imagesTmp = $_FILES["images"]["tmp_name"];
      $imagesType = $_FILES["images"]["type"];

      $images1Name = $_FILES["images1"]["name"];
      $images1Size = $_FILES["images1"]["size"];
      $images1Tmp = $_FILES["images1"]["tmp_name"];
      $images1Type = $_FILES["images1"]["type"];

      $images2Name = $_FILES["images2"]["name"];
      $images2Size = $_FILES["images2"]["size"];
      $images2Tmp = $_FILES["images2"]["tmp_name"];
      $images2Type = $_FILES["images2"]["type"];

      $images3Name = $_FILES["images3"]["name"];
      $images3Size = $_FILES["images3"]["size"];
      $images3Tmp = $_FILES["images3"]["tmp_name"];
      $images3Type = $_FILES["images3"]["type"];

      $images4Name = $_FILES["images4"]["name"];
      $images4Size = $_FILES["images4"]["size"];
      $images4Tmp = $_FILES["images4"]["tmp_name"];
      $images4Type = $_FILES["images4"]["type"];



      $imagesAllowedExtention = array("jpeg", "jpg", "png", "gif");

      $imagesExtention = strtolower(end(explode(".", $imagesName)));

      $images1Extention = strtolower(end(explode(".", $images1Name)));

      $images2Extention = strtolower(end(explode(".", $images2Name)));

      $images3Extention = strtolower(end(explode(".", $images3Name)));

      $images4Extention = strtolower(end(explode(".", $images4Name)));


      $title = $_POST["title"];
      $price = $_POST["price"];
      $state = $_POST["state"];
      $etat = $_POST["etat"];
      $category = $_POST["category"];
      $brand = $_POST["brand"];
      $description = $_POST["description"];
      $telephone = $_POST["telephonez"];
      $id =  $_POST["idz"];
      $name =  $_POST["namez"];

      if (empty($title)) {
        $titleMsg = "Enter a valid title";
      }

      if (empty($brand)) {
        $brandMsg = "Enter a valid brand";
      }

      if (! is_numeric($price)) {
        $priceMsg = "Enter a valid price";
      }

      if (empty($price)) {
        $priceMsg = "Enter a valid price";
      }

      if (empty($state)) {
        $stateMsg = "Enter a valid state";
      }

      if (empty($etat)) {
        $etatMsg = "Enter a valid etat";
      }

      if (empty($category)) {
        $categoryMsg = "Enter a valid gategory";
      }

      if (empty($description)) {
        $descriptionMsg = "Enter a valid description";
      }

      if (! empty($imagesName) && ! in_array($imagesExtention, $imagesAllowedExtention)) {
        $imagesMsg = "This extention is not allowed";
      }

      if (empty($imagesName)) {
        $imagesMsg = "Enter a picture please";
      }

      if (! empty($images1Name) && ! in_array($images1Extention, $imagesAllowedExtention)) {
        $images1Msg = "This extention is not allowed";
      }

      if (! empty($images2Name) && ! in_array($images2Extention, $imagesAllowedExtention)) {
        $images2Msg = "This extention is not allowed";
      }

      if (! empty($images3Name) && ! in_array($images3Extention, $imagesAllowedExtention)) {
        $images3Msg = "This extention is not allowed";
      }

      if (! empty($images4Name) && ! in_array($images4Extention, $imagesAllowedExtention)) {
        $images4Msg = "This extention is not allowed";
      }

      if (empty($titleMsg) && empty($priceMsg) && empty($stateMsg) && empty($etatMsg) && empty($categoryMsg) && empty($descriptionMsg) && empty($imagesMsg) && empty($brandMsg)){

        $imagess = rand(0, 1000000) . "_" . $imagesName;

        move_uploaded_file($imagesTmp, "upload/images/" . $imagess);

        $imagess1 = rand(0, 1000000) . "_" . $images1Name;

        move_uploaded_file($images1Tmp, "upload/images/" . $imagess1);

        $imagess2 = rand(0, 1000000) . "_" . $images2Name;

        move_uploaded_file($images2Tmp, "upload/images/" . $imagess2);

        $imagess3 = rand(0, 1000000) . "_" . $images3Name;

        move_uploaded_file($images3Tmp, "upload/images/" . $imagess3);

        $imagess4 = rand(0, 1000000) . "_" . $images1Name;

        move_uploaded_file($images4Tmp, "upload/images/" . $imagess4);

        $sql = "INSERT INTO product (title, price, state, etat, category, brand, description, telephonez, idz, namez, images, images1, images2, images3, images4) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $con->prepare($sql);

        $result = $stmt->execute([$title, $price, $state, $etat, $category, $brand, $description, $telephone, $id, $name, $imagess, $imagess1, $imagess2, $imagess3, $imagess4]);

        if ($result) {
          ?>
          <div class="alert alert-success" role="alert">
            A simple success alert—check it out!
          </div>
          <?php
        }
      }



    }
}

include 'upper-search.php';
?>


   <div class="create-ad">
     <div class="container">
       <h1 class="text-center">Modifier l'annonce</h1>
       <form class="" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="telephonez" value="<?php echo $row["telephone"];?>">
         <input type="hidden" name="idz" value="<?php echo $row["id"];?>">
         <input type="hidden" name="namez" value="<?php echo $row["name"];?>">
         <label for="">Titre <span class="start">*</span></label>
         <textarea name="title" rows="3" cols="30" value="<?php echo $row['title']; ?>" ></textarea>
         <p class="errorr"><?php echo $titleMsg; ?></p>
         <label for="">Prix <span class="start">*</span></label>
         <input class="input-number" type="text" name="price" value="<?php echo $row['price']; ?>">
         <p class="errorr"><?php echo $priceMsg; ?></p>
         <label for="">L'etat <span class="start">*</span></label>
         <select class="" name="state">
           <option value="<?php echo $row['state']; ?>"><?php echo $row['state']; ?></option>
           <option value="Ariana" >Ariana</option>
           <option value="Ben arous">Ben arous</option>
           <option value="Bizerte">Bizerte</option>
           <option value="Beja">Beja</option>
           <option value="Gabes">Gabes</option>
           <option value="Gafsa">Gafsa</option>
           <option value="Jendouba">Jendouba</option>
           <option value="Kairouan">Kairouan</option>
           <option value="Kasserine">Kasserine</option>
           <option value="Kebili">Kebili</option>
           <option value="La manouba">La manouba</option>
           <option value="Le kef">Le kef</option>
           <option value="Mahdia">Mahdia</option>
           <option value="Monastir">Monastir</option>
           <option value="Medenine">Medenine</option>
           <option value="Nabeul">Nabeul</option>
           <option value="Sfax">Sfax</option>
           <option value="Sidi bouzid">Sidi bouzid</option>
           <option value="Siliana">Siliana</option>
           <option value="Sousse">Sousse</option>
           <option value="Tataouine">Tataouine</option>
           <option value="Tozeur">Tozeur</option>
           <option value="Tunis">Tunis</option>
           <option value="Zaghouan">Zaghouan</option>
         </select>
         <p class="errorr"><?php echo $stateMsg; ?></p>
         <label for="">Etat <span class="start">*</span></label>
         <select class="" name="etat">
           <option value="<?php echo $row['etat']; ?>"><?php echo $row['etat']; ?></option>
           <option value="Very New">Very New</option>
           <option value="New">New</option>
           <option value="Old">Old</option>
           <option value="Very old">Very old</option>
         </select>
         <p class="errorr"><?php echo $etatMsg; ?></p>
         <label for="">Category <span class="start">*</span></label>
         <select class="" name="category">
           <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
           <option value="Telephone">Telephone</option>
           <option value="Computer">Computer</option>
           <option value="Gaming accessories">Gaming accessories</option>
           <option value="Home appliance">Home appliance</option>
           <option value="Computer science">Computer science</option>
           <option value="TV">TV</option>
           <option value="Camera">Camera</option>
           <option value="Sound">Sound</option>
           <option value="Printer">Printer</option>
           <option value="Electronic card">Electronic card</option>
           <option value="Computer accessories">Computer accessories</option>
           <option value="Telephone accessories">Telephone accessories</option>
           <option value="Game console">Game console</option>
           <option value="Laptop">Laptop</option>
           <option value="Cable">Cable</option>
           <option value="Electronic component">Electronic component</option>
           <option value="Home & Garden">Home & Garden</option>
         </select>
         <p class="errorr"><?php echo $categoryMsg; ?></p>
         <label for="">Brand <span class="start">*</span></label>
         <select class="" name="brand">
           <option value="<?php echo $row['brand']; ?>"><?php echo $row['brand']; ?></option>
           <option value="Apple">Apple</option>
           <option value="MSI">MSI</option>
           <option value="Samsung">Samsung</option>
           <option value="Acer">Acer</option>
           <option value="Huawei">Huawei</option>
           <option value="Xiaomi">Xiaomi</option>
           <option value="LG">LG</option>
           <option value="Asus">Asus</option>
           <option value="Dell">Dell</option>
           <option value="Hp">Hp</option>
           <option value="Sharp">Sharp</option>
         </select>
         <p class="errorr"><?php echo $brandMsg; ?></p>
         <label for="">Description <span class="start">*</span></label>
         <textarea name="description" rows="3" cols="30" ></textarea>
         <p class="errorr"><?php echo $descriptionMsg; ?></p>
         <div class="form-group">
           <label for="exampleFormControlFile1">Example file input <span class="start">*</span></label>
           <input type="file" name="images" value="<?php echo $row['images']; ?>" class="form-control-file" id="exampleFormControlFile1">
           <p class="errorr"><?php echo $imagesMsg; ?></p>
         </div>
         <div class="form-group">
           <label for="exampleFormControlFile1">Example file input</label>
           <input type="file" name="images1" class="form-control-file" id="exampleFormControlFile1">
           <p class="errorr"><?php echo $images1Msg; ?></p>
         </div>
         <div class="form-group">
           <label for="exampleFormControlFile1">Example file input</label>
           <input type="file" name="images2" class="form-control-file" id="exampleFormControlFile1">
           <p class="errorr"><?php echo $images2Msg; ?></p>
         </div>
         <div class="form-group">
           <label for="exampleFormControlFile1">Example file input</label>
           <input type="file" name="images3" class="form-control-file" id="exampleFormControlFile1">
           <p class="errorr"><?php echo $images3Msg; ?></p>
         </div>
         <div class="form-group">
           <label for="exampleFormControlFile1">Example file input</label>
           <input type="file" name="images4" class="form-control-file" id="exampleFormControlFile1">
           <p class="errorr"><?php echo $images4Msg; ?></p>
         </div>
         <input class="btn btn-primary" type="submit" name="create" value="Poste">
         <?php echo $_POST['id_prod']; ?>
       </form>
     </div>
   </div>


<?php


include 'footer.php';

}
else {
  header("Location: homepage.php");
}

 ?>
