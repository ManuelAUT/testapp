<?php

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;

$servername = "172.31.41.18";
$username = "shop";
$password = "zGm7gkqzaGQX63Ls";
$dbname = "onlineshop";

if ($_POST['menge'] < 0 ) {
  echo "<script>alert('Falscher Input')</script>";
  header("Location: ./index.php");
} else {

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("INSERT INTO Bestellung(ArtNr, Menge, Comment)
		VALUES (:artnr, :Menge, :Comment)");
	$stmt->bindParam(':artnr', $id);
	$stmt->bindParam(':Menge', $menge);
	$stmt->bindParam(':Comment', $comment);

	$id = $_POST['artnr'];
	$menge = $_POST['menge'];
	$comment = $_POST['comment'];
	$stmt->execute();

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "\n";
    }

 $connectionString = "Endpoint=https://ringesms.servicebus.windows.net/;SharedAccessKeyName=RootManageSharedAccessKey;SharedAccessKey=NdNmdRQix0JZm6PWNa7z/iTRH/KehoMo91LxCBr3HEw=";
// Create Service Bus REST proxy.
 $serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService($connectionString);

 try    {
     echo "create msg";
     // Create message.
     $message = new BrokeredMessage("test");
     $message->setBody("ArtNr: " . $id . ", Menge: " . $menge . ", Comment :" . $comment);
     echo "send msg";
     // Send message.
     $serviceBusRestProxy->sendQueueMessage("ringe", $message);
     echo "SMS";
 }
 catch(ServiceException $e){
     // Handle exception based on error codes and messages.
     // Error codes and messages are here: 
     // https://docs.microsoft.com/rest/api/storageservices/Common-REST-API-Error-Codes
     $code = $e->getCode();
     $error_message = $e->getMessage();
     echo $code.": ".$error_message."<br />";
 }

header("Location: ./index.php");
}
?>
