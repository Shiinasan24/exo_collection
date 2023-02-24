<?php 
  include_once("environnement.php");
  include_once("function.php");

  // Requests
  // -- User
  $requestUsers = requestAllFromTable($bdd, "user");
 
  // Fetches
  // -- User
  $fetchUsers = fetchAllFrom($requestUsers);

  
  if(isset($_POST["name"]) AND isset($_POST["password"])) {
    $role = 2;
    $name = htmlentities($_POST["name"]);
    $password = htmlentities($_POST["password"]);
    $encryptedPassword = encryptionKey($password);
    
    $addUser = $bdd -> prepare("INSERT INTO user(user_role, user_name, user_password) VALUES(?,?,?)");
    $addUser -> execute(array($role, $name, $encryptedPassword));

    header("Location: connexion.php?inscription=success");
    exit();
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
  <title>Inscription</title>
</head>
<body>
  <main class="wrapperCollection">

    <aside class="sidebar">

      <?php include_once("sidebar.php"); ?>

    </aside>

    <div class="mainCollection">

      <form action="inscription.php" method="post" class="form">
       
        <div class="form-floating mb-3 formContent">
          <input name="name" type="text" class="form-control" id="floatingInput">
          <label for="floatingInput">Nom</label>
        </div>

        <div class="form-floating mb-3">
          <input  name="password" type="password" class="form-control" id="floatingPassword formContent">
          <label for="floatingPassword">Mot de passe</label>
        </div>

        <button type="submit" class="btn btn-outline-primary">S'enregistrer</button>

      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>