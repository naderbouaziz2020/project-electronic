<?php
session_start();
if (isset($_SESSION["telephone"])) {
  include 'header.php';
  include 'connectdb.php';

  echo $_SESSION["telephone"] . $_SESSION["id"] . $_SESSION["name"];



    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $imagesName = $_FILES["images"]["name"];
      $imagesSize = $_FILES["images"]["size"];
      $imagesTmp = $_FILES["images"]["tmp_name"];
      $imagesType = $_FILES["images"]["type"];

      $images1Name = $_FILES["images1"]["name"];
      $images1Size = $_FILES["images1"]["size"];
      $images1Tmp = $_FILES["images1"]["tmp_name"];
      $images1Type = $_FILES["images1"]["type"];



      $imagesAllowedExtention = array("jpeg", "jpg", "png", "gif");

      $imagesExtention = strtolower(end(explode(".", $imagesName)));

      $images1Extention = strtolower(end(explode(".", $images1Name)));


      $title = $_POST["title"];
      $price = $_POST["price"];
      $state = $_POST["state"];
      $etat = $_POST["etat"];
      $category = $_POST["category"];
      $description = $_POST["description"];
      $telephone = $_POST["telephonez"];
      $id =  $_POST["idz"];
      $name =  $_POST["namez"];

      if (empty($title)) {
        $titleMsg = "Enter a valid title";
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

      if (empty($titleMsg) && empty($priceMsg) && empty($stateMsg) && empty($etatMsg) && empty($categoryMsg) && empty($descriptionMsg) && empty($imagesMsg)){

        $imagess = rand(0, 1000000) . "_" . $imagesName;

        move_uploaded_file($imagesTmp, "upload/images/" . $imagess);

        $imagess1 = rand(0, 1000000) . "_" . $images1Name;

        move_uploaded_file($images1Tmp, "upload/images/" . $imagess1);

        $sql = "INSERT INTO product (title, price, state, etat, category, description, telephonez, idz, namez, images, images1) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $con->prepare($sql);

        $result = $stmt->execute([$title, $price, $state, $etat, $category, $description, $telephone, $id, $name, $imagess, $imagess1]);

        if ($result) {
          echo "welcome";
        }
      }



    }

?>



   <div class="create-ad">
     <div class="container">
       <h1>Add an ad</h1>
       <form class="" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="telephonez" value="<?php echo $_SESSION["telephone"];?>">
         <input type="hidden" name="idz" value="<?php echo $_SESSION["id"];?>">
         <input type="hidden" name="namez" value="<?php echo $_SESSION["name"];?>">
         <label for="">Title <span class="start">*</span></label>
         <textarea name="title" rows="3" cols="30"></textarea>
         <p class="errorr"><?php echo $titleMsg; ?></p>
         <label for="">Price <span class="start">*</span></label>
         <input class="input-number" type="text"name="price">
         <p class="errorr"><?php echo $priceMsg; ?></p>
         <label for="">state <span class="start">*</span></label>
         <select class="" name="state">
           <option value=""></option>
           <option value="sousse">sousse</option>
           <option value="tunis">tunis</option>
         </select>
         <p class="errorr"><?php echo $stateMsg; ?></p>
         <label for="">Etat <span class="start">*</span></label>
         <select class="" name="etat">
           <option value=""></option>
           <option value="New">New</option>
           <option value="Old">Old</option>
           <option value="Very old">Very old</option>
         </select>
         <p class="errorr"><?php echo $etatMsg; ?></p>
         <label for="">Category <span class="start">*</span></label>
         <input type="text" name="category" value="">
         <p class="errorr"><?php echo $categoryMsg; ?></p>
         <label for="">Description <span class="start">*</span></label>
         <textarea name="description" rows="3" cols="30"></textarea>
         <p class="errorr"><?php echo $descriptionMsg; ?></p>
         <div class="form-group">
           <label for="exampleFormControlFile1">Example file input <span class="start">*</span></label>
           <input type="file" name="images" class="form-control-file" id="exampleFormControlFile1">
           <p class="errorr"><?php echo $imagesMsg; ?></p>
         </div>
         <div class="form-group">
           <label for="exampleFormControlFile1">Example file input <span class="start">*</span></label>
           <input type="file" name="images1" class="form-control-file" id="exampleFormControlFile1">
           <p class="errorr"><?php echo $images1Msg; ?></p>
         </div>
         <input class="btn btn-primary" type="submit" name="create" value="Poste">
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
