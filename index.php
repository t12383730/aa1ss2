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
                    if($message['text'] == '2'){
                        require_once('include/product_template.php');
                    }else if($message['text'] == '3'){
                        require_once('include/mid.php');
                    }else{
                        $client->replyMessage(array(
                          'replyToken' => $event['replyToken'],
                          'messages' => array(
                            array(
                            'type' => 'text',
                            'text' => $message
                            )
                          )
                        )); 
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
