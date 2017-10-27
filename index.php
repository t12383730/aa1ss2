<?php

date_default_timezone_set("Asia/Taipei"); // 設定時區為台北時區
require_once('LINEBotTiny.php');
if (file_exists(__DIR__ . '/config.php')) {
    $config = include __DIR__ . '/config.php'; // 引入設定檔
    if ($config['channelAccessToken'] == Null || $config['channelSecret'] == Null) {
        error_log("config.php 設定檔內的驗證權杖和粉絲專頁存取權杖尚未設定完全！", 0); // 輸出錯誤
    } else {
        $channelAccessToken = $config['channelAccessToken'];
        $channelSecret = $config['channelSecret'];
    }
} else {
    $configFile = fopen("config.php", "w") or die("Unable to open file!");
    $configFileContent = "<?php

return [
    'channelAccessToken' => '',
    'channelSecret' => ''
];
?>";
    fwrite($configFile, $configFileContent); // 建立文件並寫入
    fclose($configFile); // 關閉文件
    error_log("config.php 設定檔建立成功，請編輯檔案輸入驗證權杖和粉絲專頁存取權杖！", 0); // 輸出錯誤
}
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            
            switch ($message['type']) {
                case 'text':
                    if($message['text'] == '1'){
                     $client->replyMessage(array(
                    'replyToken' => $event['replyToken'],
                    'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => $message['text'].'，大家好，歡迎來到測試'
                            )
                        )
                    )); //回話    
                        
                    }else if($message['text'] == '2'){
                    $client->replyMessage(array(
                    'replyToken' => $event['replyToken'],
                    'messages' => array(
                        array(
                            'type' => 'template', // 訊息類型 (模板)
                            'altText' => 'Example buttons template', // 替代文字
                            'template' => array(
                                'type' => 'carousel', // 類型 (旋轉木馬)
                                'columns' => array(
                                    array(
                                        'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                                        'title' => 'Example Menu 1', // 標題 1 <不一定需要>
                                        'text' => 'Description 1', // 文字 1
                                        'actions' => array(
                                            array(
                                                'type' => 'postback', // 類型 (回傳)
                                                'label' => 'postback 1', // 標籤 1
                                                'data' => 'action=buy&itemid=123' // 資料
                                            ),
                                            array(
                                                'type' => 'message', // 類型 (訊息)
                                                'label' => 'Message example 1', // 標籤 2
                                                'text' => 'Message example 1' // 用戶發送文字
                                            ),
                                            array(
                                                'type' => 'uri', // 類型 (連結)
                                                'label' => 'Uri example 1', // 標籤 3
                                                'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                                            )
                                        )
                                    ),
                                    array(
                                        'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                                        'title' => 'Example Menu 2', // 標題 2 <不一定需要>
                                        'text' => 'Description 2', // 文字 2
                                        'actions' => array(
                                            array(
                                                'type' => 'postback', // 類型 (回傳)
                                                'label' => 'postback 2', // 標籤 1
                                                'data' => 'action=buy&itemid=123' // 資料
                                            ),
                                            array(
                                                'type' => 'message', // 類型 (訊息)
                                                'label' => 'Message example 2', // 標籤 2
                                                'text' => 'Message example 2' // 用戶發送文字
                                            ),
                                            array(
                                                'type' => 'uri', // 類型 (連結)
                                                'label' => 'Uri example 2', // 標籤 3
                                                'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                                            )
                                        )
                                    ),
                                    array(
                                        'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                                        'title' => 'Example Menu 2', // 標題 2 <不一定需要>
                                        'text' => 'Description 2', // 文字 2
                                        'actions' => array(
                                            array(
                                                'type' => 'postback', // 類型 (回傳)
                                                'label' => 'postback 2', // 標籤 1
                                                'data' => 'action=buy&itemid=123' // 資料
                                            ),
                                            array(
                                                'type' => 'message', // 類型 (訊息)
                                                'label' => 'Message example 2', // 標籤 2
                                                'text' => 'Message example 2' // 用戶發送文字
                                            ),
                                            array(
                                                'type' => 'uri', // 類型 (連結)
                                                'label' => 'Uri example 2', // 標籤 3
                                                'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                                            )
                                        )
                                    )
                                ) // colmuns array
                            ) // templace array
                        ) // message 下 array 
                    ) // message
                    )); // $clinet
                    }else{
                        
                    $client->replyMessage(array(
                    'replyToken' => $event['replyToken'],
                    'messages' => array(
                        array(
                          'type' => 'text',
                          'text' => '12346'
                       )
                    )
                    )); 
                        
                    }
                    break;
                default:
                    //error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        case 'postback':
            //require_once('postback.php'); // postback
            break;
        default: //加入好友、群組招呼語
            //error_log("Unsupporeted event type: " . $event['type']);
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => '大家好，這是一個範例 Bot OuO 範例程式開源至 GitHub (包含教學)：'
                    )
                )
            ));
            break;
    }
};
?>
