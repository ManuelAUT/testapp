<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:direktdb.database.windows.net,1433; Database = Products", "student", "asdf1234.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE Products(
		id int IDENTITY(1,1) PRIMARY KEY,
		bezeichnung VARCHAR(30) NOT NULL ,
		langbeschreibung VARCHAR(256) NOT NULL ,
		thumbnail VARCHAR(256) NOT NULL ,
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