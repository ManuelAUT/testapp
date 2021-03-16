<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:direktdb.database.windows.net,1433; Database = Products", "student", "asdf1234.");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("INSERT INTO Products(bezeichnung, thumbnail, langbeschreibung)
		VALUES (:bezeichnung, :thumbnail, :langbeschreibung)");
	$stmt->bindParam(':bezeichnung', $bezeichnung);
	$stmt->bindParam(':thumbnail', $thumbnail);
	$stmt->bindParam(':langbeschreibung', $langbeschreibung);

	$bezeichnung = $_POST['bezeichnung'];
	$thumbnail = $_POST['thumbnail'];
	$langbeschreibung = $_POST['langbeschreibung'];
	$stmt->execute();

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "\n";
    }

header("Location: ./index.php");

/*
INSERT INTO Products (bezeichnung, thumbnail, langbeschreibung)
	VALUES ('value1', 'https://thewowgallery.de/wp-content/uploads/2020/04/instagram-bilder-qualita%CC%88t-1024x576.jpg', 'value3');
*/
?>