<?php

$first_date = $_GET["first_date"];
$second_date = $_GET["second_date"];

try{
  require "connection.php";
  $stmt = $dbh->prepare("SELECT * FROM film WHERE date between :first_date AND :second_date");
  $stmt->bindParam(":first_date", $first_date);
  $stmt->bindParam(":second_date", $second_date);
  $stmt->execute();
  $cursor = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "Список фільмів за вказаний часовий інтервал:";
  foreach ($cursor as $item) {
    echo "<hr>";
    echo "<li>" . $item["name"] . " " . $item["date"] . "</li>";
  }
} catch (PDOException $ex) {
  echo $ex->getMessage(); 
}

?>