<?php 
   include_once("environnement.php"); 
   include_once("function.php");

   $requestItems = $bdd -> query("SELECT * FROM item INNER JOIN user ON user_id = user.id");
   $dataItems = $requestItems -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
   <title>Collection</title>
</head>
<body>

<main class="bodyWrapper">
   <aside class="sidebar"> <?php require_once("sidebar.php") ?> </aside>

   <div class="wrapperCollection">
      <div class="background">
         <!-- <img src="assets/img/socleM.png" alt=""> -->
      </div>
      
      <img class="phoneOne" src="assets/img/phone1.png" alt="">

      <div class="cardWrapper">

         <?php foreach($dataItems as $item) { ?>

            <div class="card">
               <img src="assets/img/<?= $item["item_image"] ?>" class="card-image" alt="<?= $item["item_name"] ?>">
               <div class="card-content">
                  <h5 class="card-item"><?= $item["item_name"] ?></h5>
                  <span class="card-author"><span class="by">ajouté par </span><?= $item["user_name"] ?></span>
               </div>
            </div>            
            
         <?php } ?>

      </div>
      
   </div>

</main>
   
<script src="script.js"></script>
</body>
</html>