<?php

try {
  $conn = new PDO("sqlsrv:server = tcp:direktdb.database.windows.net,1433; Database = Products", "student", "asdf1234.");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE Products SET bezeichnung = :bezeichnung,
      thumbnail = :thumbnail,
      langbeschreibung = :langbeschreibung
      WHERE id = :id;");
  $stmt->bindParam(':bezeichnung', $bezeichnung);
	$stmt->bindParam(':thumbnail', $thumbnail);
	$stmt->bindParam(':langbeschreibung', $langbeschreibung);
  $stmt->bindParam(':id', $id);

	$bezeichnung = $_POST['bezeichnung'];
	$thumbnail = $_POST['thumbnail'];
	$langbeschreibung = $_POST['langbeschreibung'];
  $id = $_POST['id'];
	$stmt->execute();

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "\n";
    }

header("Location: ./index.php");


?>
