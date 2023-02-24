<?php 
   include_once("environnement.php");
   include_once("function.php");

   if(isset($_SESSION["session_id"]) AND 
      isset($_POST["name"]) AND 
      isset($_POST["description"]) AND 
      isset($_POST["year"])) {
         
      $session_id = $_SESSION["session_id"];
      $name = htmlentities($_POST["name"]);
      $description = htmlentities($_POST["description"]);
      $year = htmlentities($_POST["year"]);

      if(isset($_FILES["image"])) {
         $getImage = $_FILES["image"];
         $fileName = $getImage["name"];
         $imageTmp = $getImage["tmp_name"];
         $infoImage = pathinfo($fileName);
         $extImage = $infoImage["extension"];
         $imageName = $infoImage["filename"];
         $uniqueName = $imageName . time() . rand(1, 1000) . "." . $extImage;
         move_uploaded_file($imageTmp, "assets/img/uploads/" . $uniqueName);
         $image = $uniqueName;
      }
     
   } else {
      $session_id = "4";
      $name = "placeholder";
      $image = "default.png";
      $description = "placeholder";
      $year = "2000";
   }
   
   $rqPrepAdd = $bdd -> prepare("INSERT INTO item(user_id, item_image, item_name, item_description, item_creationYear) VALUES(?, ?, ?, ?, ?)");
   $rqPrepAdd -> execute(array($session_id, $image, $name, $description, $year));
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
   <title>Ajout</title>
</head>
<body>

<main class="bodyWrapper">
   <aside class="sidebar"> <?php require_once("sidebar.php") ?> </aside>

   <div class="contentWrapper">

      <div class="background">
         <!-- <img src="assets/img/socleM.png" alt=""> -->
      </div>
      
      <img class="phoneOne" src="assets/img/phone1.png" alt="">

      <div class="cardWrapper">

         <form action="ajout.php" method="post" enctype="multipart/form-data">

            <div class="formWrapper">

               <div class="inputGroup">

                  <div class="inputFifty">
   
                     <label for="name" class="form-label">Nom du téléphone</label>
                     <input type="text" name="name" id="name" class="form-control">
                  </div>
   
                  <div class="inputFifty">
   
                     <label for="image" class="form-label">Image</label>
                     <input type="file" name="image" id="image" class="form-control">
                  </div>
               </div>

               <div class="inputDescr">

                  <label for="description" class="form-label">Description</label>
                  <input type="text" name="description" id="description" class="form-control">
               </div>

               <div class="inputYear">

                  <label for="year" class="form-label">Année de création</label>
                  <input type="text" name="year" id="year" class="form-control">
               </div>

               <div class="btnWrapper">
                  
                  <button type="submit" class="btn btn-outline-primary btnAdd">Ajouter</button>
               </div>
            </div>

         </form>

      </div>
      
   </div>

</main>
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>