<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:direktdb.database.windows.net,1433; Database = Products", "student", "asdf1234.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DROP TABLE Products");
    $stmt->execute();

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "</table>";
$conn = null;
?>
