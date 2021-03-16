<?php

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;

if ($_POST['menge'] < 0 ) {
  echo "<script>alert('Falscher Input')</script>";
  header("Location: ./index.php");
} else {

try {
   
	$id = $_POST['artnr'];
	$menge = $_POST['menge'];
	$comment = $_POST['comment'];

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "\n";
    }

    $connectionString = "Endpoint=sb://direktsms.servicebus.windows.net/;SharedAccessKeyName=RootManageSharedAccessKey;SharedAccessKey=CXz81wQJmzr0DxtBDnXtWrFGiYNjo61axinpu0B8bFQ=";
    // Create Service Bus REST proxy.
     $serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService($connectionString);

try    {
     echo "create msg";
     // Create message.
     $message = new BrokeredMessage();
     $message->setBody("message");
     echo "send msg";
     echo "ArtNr: " . "$id" . ", Menge: " . "$menge" . ", Comment :" . "$comment";
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