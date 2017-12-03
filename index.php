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

$googledataspi = "https://spreadsheets.google.com/feeds/list/1acQdkyKOS-L_Jsp__flWZ69tzUh6aKDBYKc50pq16No/od6/public/values?alt=json";

// 將Google表單轉成JSON資料
$json = file_get_contents($googledataspi);
$data = json_decode($json, true);           
$store_text=''; 
// 資料起始從feed.entry          
foreach ($data['feed']['entry'] as $item) {
  // 將keywords欄位依,切成陣列
  $keywords = explode(',', $item['gsx$keywords']['$t']);
  
  // 以關鍵字比對文字內容，符合的話將店名/地址寫入
  foreach ($keywords as $keyword) {
    if (mb_strpos($message['text'], $keyword) !== false) {                      
      $store_text = $item['gsx$storename']['$t']." 地址是:".$item['gsx$storeaddress']['$t'];                 
    }
  }
}       

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            
            switch ($message['type']) {
                case 'text':
                    /*if($message['text'] == '2'){
                        require_once('include/product_template.php');
                    }else if($message['text'] == '3'){
                        require_once('include/mid.php');
                    }else{
                        require_once('include/echo.php'); 
                    }*/
                    $client->replyMessage(array(
                      'replyToken' => $event['replyToken'],
                      'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => '你想要找'.$message['text'].' 讓我想想喔…',
                        ),
                        array(
                            'type' => 'text',
                            'text' => '介紹你 '.$store_text.' 不錯喔',
                        )
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

$myfile = fopen("try.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
