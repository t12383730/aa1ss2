<?php

$client->replyMessage(array(
  'replyToken' => $event['replyToken'],
  'messages' => array(
     array(
       'type' => 'text',
       'text' => '大家好，歡迎來到測試
輸入1:打招呼
輸入2:全品項'
     )
   )
));

?>
