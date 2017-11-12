<?php

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('j1p3bvFuEijXmUrDHm3yqZTfi/7ZAhhFwBNL3uKbAMDUE7y2J2pakf9QsChldggWLz4WBlciG266qnemDfM3nYeRGXqaX4aOaHh5hzv7zzAHoD9TB0vVEltC6lgKf9LFFI4CmK3zvpcSpCYDImUiCQdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '00e76b88be7c1520a8616878772ea5d6']);
$response = $bot->getProfile('U206d25c2ea6bd87c17655609a1c37cb8');
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    $displayName = $profile['displayName'];
    $pictureUrl = $profile['pictureUrl'];
    $statusMessage $profile['statusMessage'];
}

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
       'text' => $displayName
     )
   )
));
?>
