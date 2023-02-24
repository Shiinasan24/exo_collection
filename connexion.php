<?php 
  include_once("environnement.php");
  include_once("function.php");


  if(isset($_GET["inscription"])) {
    $inscription = $_GET["inscription"];
    if($inscription === "success") {
      $successInscription = "<span class='success mb-5'>Vous êtes maintenant inscrit, veuillez vous connecter en remplissant le formulaire ci-dessous :</span>";
    }
  }

  if(isset($_GET["failure"])) {
    $failure = $_GET["failure"];
    if($failure === "1") {
      $connexionFailure = "<span class='error mb-5'>Erreur : Nom d'utilisateur ou mot de passe incorrect</span>";
    }
  }


  if(isset($_POST["name"]) AND isset($_POST["password"])) {
    $userName = htmlentities($_POST["name"]);
    $userPassword = strtolower(htmlentities($_POST["password"]));
    $decryptedPassword = encryptionKey($userPassword);
    
    $rqUser = $bdd -> query("SELECT * FROM user WHERE user_name = '$userName'");
    $data = $rqUser -> fetch();
    $dataUserID = $data["id"];
    $dataUserName = $data["user_name"];
    $dataUserPassword = $data["user_password"];
    $dataUserRole = $data["user_role"];
    
    $userNameToLower = strtolower($userName);
    $DataUserNameToLower = strtolower($dataUserName);

    if($userNameToLower === $DataUserNameToLower AND $decryptedPassword === $dataUserPassword) {
      $_SESSION["session_id"] = $dataUserID;
      $_SESSION["session_user"] = $dataUserName;
      $_SESSION["session_role"] = $dataUserRole;
      header("Location: index.php?success=1");
      quit();
    } else {
      header("Location: connexion.php?failure=1");
      quit();
    }    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Connexion</title>
</head>
<body>
  <main class="wrapperCollection">

    
    <aside class="sidebar">
      
      <?php include_once("sidebar.php"); ?>
      
    </aside>
    
    <div class="mainCollection">

      <?php if(isset($_GET["inscription"])) { echo $successInscription; } ?>
      <?php if(isset($_GET["failure"])) { echo $connexionFailure; } ?>
      

      <form action="connexion.php" method="post" class="form">

        <div class="form-floating mb-3 formContent">
          <input name="name" type="text" class="form-control" id="floatingInput">
          <label for="floatingInput">Nom</label>
        </div>

        <div class="form-floating mb-3">
          <input  name="password" type="password" class="form-control" id="floatingPassword formContent">
          <label for="floatingPassword">Mot de passe</label>
        </div>

        <button type="submit" class="btn btn-outline-primary">Se connecter</button>

      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>