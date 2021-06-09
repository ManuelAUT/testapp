<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:terraform-sqlserver-5672.database.windows.net,1433; Database = Products", "Manuel", "asdf1234.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DROP TABLE Productstable");
    $stmt->execute();

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "</table>";
$conn = null;
?>
