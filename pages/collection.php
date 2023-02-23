<?php 
  include_once("../environnement.php"); 
  include_once("../component/function.php");

  $requestItems = requestAllFromTable($bdd, "item");
  $dataItems = fetchAllFrom($requestItems);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Collection</title>
</head>

<body>
  <main class="wrapperCollection">

    <aside class="sidebar">

      <?php include_once("../component/sidebar.php"); ?>

    </aside>
  
    <div class="mainCollection">
      
      <div class="wrapperMain">
        <?php foreach($dataItems as $item) { ?>
          <article class="cards">
            <img src="https://via.placeholder.com/300" alt="">
            <h4><?= $item -> item_name ?></h4>
            <p><?= $item -> item_description ?></p>
            <span><?= $item -> item_creationYear ?></span>
          </article>
        <?php } ?>
      </div>
    </div>
  </main>
  
</body>
</html>