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
            
            switch ($message['type']) {
                case 'text':
                    if($message['text'] == '2'){
                        require_once('include/product_template.php');
                    }else if($message['text'] == '3'){
                        require_once('include/mid.php');
                    }else{
                        require_once('include/help.php');
                    }
                    
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
