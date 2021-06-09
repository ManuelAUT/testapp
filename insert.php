<?php

try {
	$connectionInfo = array("UID" => "Manuel", "pwd" => "asdf1234.", "Database" => "Products", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:terraform-sqlserver-5672.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);

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