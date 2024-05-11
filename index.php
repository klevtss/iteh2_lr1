<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ЛР1</title>
</head>
<body>
  <?php
    require_once "connection.php"; 
  ?>
  
  Список фільмів обраного жанру
  <form action="filmsByGenre.php">
    <select name="ID_Genre">
      <?php
        $stmt = $dbh->prepare("SELECT * from genre ORDER BY ID_Genre ASC");
        $stmt->execute(); 
        $cursor = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($cursor as $item) {
          echo "<option value=" . $item["ID_Genre"] . ">" . $item["title"] . "</option>";
        }
      ?>
    </select>
    <input type="submit" value="Обрати">
  </form>

  Список фільмів з обраним актором
  <form action="filmsByActor.php">
    <select name="ID_Actor">
      <?php
        $stmt = $dbh->prepare("SELECT * from actor ORDER BY ID_Actor ASC");
        $stmt->execute(); 
        $cursor = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($cursor as $item) {
          echo "<option value=" . $item["ID_Actor"] . ">" . $item["name"] . "</option>";
        }
      ?>
    </select>
    <input type="submit" value="Обрати">
  </form>

  Список фільмів за вказаний часовий інтервал
  <form action="filmsByDate.php">
    <label for="first_date">Перша дата</label>
    <input type="date" id="first_date" name="first_date" value="2009-09-09">
    <label for="second_date">Друга дата</label>
    <input type="date" id="second_date" name="second_date" value="2014-09-01">
    <input type="submit" value="Обрати">
  </form>
</body>
</html>