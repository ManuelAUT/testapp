<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:direktdb.database.windows.net,1433; Database = Products", "student", "asdf1234.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE Products(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		bezeichnung VARCHAR(30) NOT NULL,
		langbeschreibung VARCHAR(256) NOT NULL,
		thumbnail VARCHAR(256) NOT NULL,
		reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";

	$conn->exec($sql);
	echo "Table Products created successfully" . "\n";
	}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "\n";
    }
?>
<br>
<br>
<a href=./index.php>Back</a>

