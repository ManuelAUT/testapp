<?php

try {
	$username = 'Manuel';
	$password = 'asdf1234.';
	$dbName = 'produktedb';
	$dbHost = "ansiblemysqldb234628.mysql.database.azure.com";

	$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $dbHost);

	$conn = new PDO($dsn, $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE Products(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		bezeichnung VARCHAR(30) NOT NULL ,
		langbeschreibung VARCHAR(256) NOT NULL ,
		thumbnail VARCHAR(256) NOT NULL
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

<?php
/*

zweite db:
create table Bestellung(
	ArtNr int primary key,
	Menge int not null,
	Comment VARCHAR(256) NOT NULL)

*/
?>