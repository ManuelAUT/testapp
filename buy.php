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

    $connectionString = "Endpoint=sb://direktsms.servicebus.windows.net/;SharedAccessKeyName=RootManageSharedAccessKey;SharedAccessKey=lir3CwExjuUrE2iVpkx+HNgL4OSx8ykhMeaMQxTs84o=";
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
     $serviceBusRestProxy->sendQueueMessage("buymsg", $message);
     echo "SMS";
 }
 catch(ServiceException $e){
     echo "catch";
     $code = $e->getCode();
     $error_message = $e->getMessage();
     echo $code.": ".$error_message."<br />";
     echo "catch";
 }

header("Location: ./index.php");
}
?>