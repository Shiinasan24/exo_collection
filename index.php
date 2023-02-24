<?php 
  include_once("environnement.php");
  include_once("function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Accueil</title>
</head>

<body>
  <main class="wrapperCollection">

    <aside class="sidebar">

      <?php require_once("sidebar.php"); ?>

    </aside>
  
    <div class="mainCollection">
      
      <div class="wrapperMain">

        <div class="mainTitle">
          <h1>TITRE PRINCIPAL DE L'ACCUEIL</h1>
        </div>

        <div class="mainContent">
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem animi quo velit tempora odio? Atque mollitia cupiditate quasi, nulla, aliquam eum impedit explicabo delectus debitis consequuntur, dolorum architecto eveniet praesentium.</p>
        </div>
      </div>
    </div>
  </main>
  
</body>

</html>