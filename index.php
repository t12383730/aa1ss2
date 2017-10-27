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
                     /*$client->replyMessage(array(
                    'replyToken' => $event['replyToken'],
                    'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => $message['text'].'大家好'
                            )
                        )
                    )); 回話 */
                    
                    $client->replyMessage(array(
                    'replyToken' => $event['replyToken'],
                    'messages' => array(
                        array(
                            'type' => 'template',
                            'altText' => '大家好',
                            'template' => array(
                              'type' => 'carousel',
                              'columns' => array(
                                array(
                                    'thumbnailImageUrl' => 'https://example.com/bot/images/item1.jpg',
                                    'title' => '這是目錄',
                                    'text' => '選擇內容',
                                    'actions' => array(
                                      array(
                                        'type' => 'postback',
                                        'label' => 'Buy',
                                        'data' => 'action=buy&itemid=111'
                                      ),
                                      array(
                                        'type' => 'message',
                                        'label' => '消息',
                                        'text' => '發送消息'  
                                      ),
                                      array(
                                        "type": "uri",
                                        "label": "健康文摘",
                                        "uri": "http://twdnews.com/"
                                      )  
                                    ) // 'actions 括號
                                ), 
                                array(
                                   'thumbnailImageUrl' => 'https://example.com/bot/images/item1.jpg',
                                    'title' => '這是目錄',
                                    'text' => '選擇內容',
                                    'actions' => array(
                                      array(
                                        'type' => 'postback',
                                        'label' => 'Buy',
                                        'data' => 'action=buy&itemid=111'
                                      ),
                                      array(
                                        'type' => 'message',
                                        'label' => '消息',
                                        'text' => '發送消息'  
                                      ),
                                      array(
                                        "type": "uri",
                                        "label": "健康文摘",
                                        "uri": "http://twdnews.com/"
                                      )  
                                    ) // 'actions 括號 
                                )  
                              )// 'columns' 括號
                            ) // ''template 括號
                        ) // 'messages' 下面 array 括號
                      ) //'messages' array括號
                    )); //$client雙括號 
                    
                    //require_once('includes/text.php'); // Type: Text
                    //require_once('includes/image.php'); // Type: Image
                    //require_once('includes/video.php'); // Type: Video
                    //require_once('includes/audio.php'); // Type: Audio
                    //require_once('includes/location.php'); // Type: Location
                    //require_once('includes/sticker.php'); // Type: Sticker
                    //require_once('includes/imagemap.php'); // Type: Imagemap
                    //require_once('includes/template.php'); // Type: Template
                    break;
                default:
                    //error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        case 'postback':
            //require_once('postback.php'); // postback
            break;
        default:
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
