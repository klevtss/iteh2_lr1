<?php

$genreId = $_GET["ID_Genre"];

try{
  require "connection.php";
  $stmt = $dbh->prepare("SELECT name, date, country FROM film JOIN film_genre ON ID_FILM = FID_FILM WHERE FID_GENRE = :genreId");
  $stmt->bindParam(":genreId", $genreId);
  $stmt->execute();
  $cursor = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "Список фільмів обраного жанру:";
  foreach ($cursor as $item) {
    echo "<hr>";
    echo "<li>" . $item["name"] . " " . $item["date"] . " " . $item["country"] ."</li>";
  }
} catch (PDOException $ex) {
  echo $ex->getMessage(); 
}

?>