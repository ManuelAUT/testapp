<?php
$servername = "direktdb.database.windows.net";
$username = "student@ringmysql@direktdb";
$password = "asdf1234.";
$dbname = "Products";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
