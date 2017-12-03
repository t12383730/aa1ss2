<?php

$client->replyMessage(array(
  'replyToken' => $event['replyToken'],
  'messages' => array(
     array(
       'type' => 'text',
       'text' => $message
     )
   )
));

?>
