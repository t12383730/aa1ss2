<?php
/*$bot = new \LINE\LINEBot(new CurlHTTPClient('j1p3bvFuEijXmUrDHm3yqZTfi/7ZAhhFwBNL3uKbAMDUE7y2J2pakf9QsChldggWLz4WBlciG266qnemDfM3nYeRGXqaX4aOaHh5hzv7zzAHoD9TB0vVEltC6lgKf9LFFI4CmK3zvpcSpCYDImUiCQdB04t89/1O/w1cDnyilFU='), [
    'channelSecret' => '00e76b88be7c1520a8616878772ea5d6'
]);

$res = $bot->getProfile('user-id');
if ($res->isSucceeded()) {
    $profile = $res->getJSONDecodedBody();
    $displayName = $profile['displayName'];
    $statusMessage = $profile['statusMessage'];
    $pictureUrl = $profile['pictureUrl'];
}*/

$client->replyMessage(array(
  'replyToken' => $event['replyToken'],
  'messages' => array(
     /*array(
       'type' => 'text',
       'text' => $displayName
     ),
     array(
       'type' => 'text',
       'text' => $statusMessage
     ),*/
     array(
       'type' => 'text',
       'text' => 'HELLO'
     )
   )
));
?>
