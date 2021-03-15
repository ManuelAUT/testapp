<?php
$servername = "ringmysql.mysql.database.azure.com";
$username = "student@ringmysql";
$password = "asdf1234.";
$dbname = "Products";


try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE " . $dbname;
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>" . "\n";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "\n";
    }



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
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

