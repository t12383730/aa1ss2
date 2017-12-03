<?php

date_default_timezone_set("Asia/Taipei"); // 設定時區為台北時區
require_once('LINEBotTiny.php');
$channelAccessToken = 'j1p3bvFuEijXmUrDHm3yqZTfi/7ZAhhFwBNL3uKbAMDUE7y2J2pakf9QsChldggWLz4WBlciG266qnemDfM3nYeRGXqaX4aOaHh5hzv7zzAHoD9TB0vVEltC6lg
Kf9LFFI4CmK3zvpcSpCYDImUiCQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '00e76b88be7c1520a8616878772ea5d6';   

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            
            $json = file_get_contents('https://spreadsheets.google.com/feeds/list/1tQCaj3LUVwH0tBuPrfBY2dOJuF-qzpYEdOqGdNvJRLc/od6/public/values?alt=json');
            $data = json_decode($json, true);
            $result = array();
 
            foreach ($data['feed']['entry'] as $item) {
              $keywords = explode(',', $item['gsx$keyword']['$t']);
              foreach ($keywords as $keyword) {
                if (mb_strpos($message['text'], $keyword) !== false) {
                  $candidate = array(
                    'thumbnailImageUrl' => $item['gsx$photourl']['$t'],
                    'title' => $item['gsx$title']['$t'],
                    'text' => $item['gsx$title']['$t'],
                    'actions' => array(
                      array(
                      'type' => 'uri',
                      'label' => '查看詳情',
                      'uri' => $item['gsx$url']['$t'],
                      ),
                    ),
                  );
                  array_push($result, $candidate);
                }
              }
            }
            
            switch ($message['type']) {
                case 'text':
                    /*if($message['text'] == '2'){
                        require_once('include/product_template.php');
                    }else if($message['text'] == '3'){
                        require_once('include/mid.php');
                    }else{
                        require_once('include/help.php');
                    }*/
                    
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $message['text'].'讓我想想喔…',
                            ),
                            array(
                                'type' => 'template',
                                'altText' => '為您推薦下列美食：',
                                'template' => array(
                                    'type' => 'carousel',
                                    'columns' => $result,
                                ),
                            ),
                            array(
                                'type' => 'text',
                                'text' => '這些都超好吃，真心不騙！',
                            ),
                            array(
                                'type' => 'sticker',
                                'packageId' => '1',
                                'stickerId' => '2',
                            ),
                        ),
                    ));
                    
                    break;
                default:
                    require_once('include/welcome.php'); 
                    break;
            }
            break;
        case 'postback':
            //require_once('postback.php'); // postback
            break;
        default: //加入好友、群組招呼語
            require_once('include/join.php'); 
            break;
    }
};

?>
