<?php

$client->replyMessage(array(
  'replyToken' => $event['replyToken'],
  'messages' => array(
    array(
      'type' => 'text',
      'text' => '感謝您的留言，客服人員會盡快回覆您的問題
(如有急需回覆，請至 http://www.google.com 留言)'
    )
  )
)); 

?>
