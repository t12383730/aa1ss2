<?php

$client->replyMessage(array(
  'replyToken' => $event['replyToken'],
  'messages' => array(
     array(
       'type' => 'text',
       'text' => '大家好，歡迎來到測試\n輸入1是打招呼\n輸入2是全品項：'
     )
   )
));

?>
