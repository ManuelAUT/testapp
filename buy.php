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
  echo "1";
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "\n";
    }

    echo "2";
    $connectionString = "Endpoint=sb://direktsms.servicebus.windows.net/;SharedAccessKeyName=RootManageSharedAccessKey;SharedAccessKey=lir3CwExjuUrE2iVpkx+HNgL4OSx8ykhMeaMQxTs84o=";
    // Create Service Bus REST proxy.
     $serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService($connectionString);
     echo "3";
try    {
     echo "create msg <br>";
     // Create message.
     $message = new BrokeredMessage();
     $message->setBody("message");
     echo "send msg";
     echo "ArtNr: " . "$id" . ", Menge: " . "$menge" . ", Comment :" . "$comment" . "<br>";
     // Send message.
     $serviceBusRestProxy->sendQueueMessage("buymsg", $message);
     echo "SMS sent";
 }
 catch(ServiceException $e){
     echo "4";
     $code = $e->getCode();
     $error_message = $e->getMessage();
     echo $code.": ".$error_message."<br />";
     echo "5";
 }

echo "6";
header("Location: ./index.php");
}
?>