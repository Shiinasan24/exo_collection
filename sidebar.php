<?php 
  if(isset($_SESSION["session_user"])) {
    $session = $_SESSION["session_user"];
  }
?>

<ul class="navlinks">
  <li class="navElement"><a href="index.php">Accueil</a></li>
  <li class="navElement"><a href="collection.php">Collection</a></li>
  <?php if(!isset($session)) { ?>
    <li class="navElement"><a href="inscription.php">Inscription</a></li>
    <li class="navElement"><a href="connexion.php">Connexion</a></li>
  <?php } ?>
  <?php if(isset($session)) { ?>
    <li class="navElement"><a href="ajout.php">Ajout</a></li>
    <li class="navElement"><a href="deconnexion.php">Déconnexion</a></li>
  <?php } ?>
</ul>
