<?php

try {
	$username = 'Manuel';
	$password = 'asdf1234.';
	$dbName = 'produktedb';
	$dbHost = "ansiblemysqldb234628.mysql.database.azure.com";

	$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $dbHost);

	$conn = new PDO($dsn, $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE Productstable SET bezeichnung = :bezeichnung,
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
