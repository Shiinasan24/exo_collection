<?php 

  function request($db, $col, $table) {
    $request = $db -> query("SELECT $col FROM $table WHERE user_name = ");
    return $request;
  }

  function requestAllFromTable($db, $table) {    
    $request = $db -> query("SELECT * FROM $table");
    return $request;
  }

  function fetchAllFrom($request) {
    $fetch = $request -> fetchAll();
    return $fetch;
  }

  function encryptionKey($password) {
    $key = sha1(sha1("k6fDz?.4ot/##" . $password . "_'çy=RrhFZbdnjz"));
    return $key;
  }

  function dda(array $as){
    while ($as){
      echo '<pre>';
      var_dump($as);
      exit();
      echo '</pre>';
    }
  }

  
