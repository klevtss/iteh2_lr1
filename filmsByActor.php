<?php

$actorId = $_GET["ID_Actor"];

try{
  require "connection.php";
  $stmt = $dbh->prepare("SELECT name FROM film JOIN film_actor ON ID_FILM = FID_FILM WHERE FID_ACTOR = :actorId");
  $stmt->bindParam(":actorId", $actorId);
  $stmt->execute();
  $cursor = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "Список фільмів з обраним актором:";
  foreach ($cursor as $item) {
    echo "<hr>";
    echo "<li>" . $item["name"] . " " . $item["producer"] . " " . $item["country"] ."</li>";
  }
} catch (PDOException $ex) {
  echo $ex->getMessage(); 
}

?>