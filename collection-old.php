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
  <main class="wrapperCollection">

    <aside class="sidebar">

      <?php require_once("sidebar.php"); ?>

    </aside>
  
    <div class="mainCollection">
      <div class="wrapperMain">
        <?php foreach($dataItems as $item) { ?>
          <div class="itemElement">
            <div class="card">
              <img src="assets/img/<?= $item["image"] ?>" class="card-image" alt="<?= $item["item_name"] ?>">
              <div class="card-content">
                <h5 class="card-title"><?= $item["item_name"] ?></h5>
                <p class="card-text"><?= $item["item_description"] ?></p>
              </div>
            </div>            
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
  
</body>
</html>