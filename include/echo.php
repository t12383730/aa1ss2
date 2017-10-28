<?php
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => '歡迎來到測試
                輸入1:歡迎訊息
                輸入2:全部內容' // 回復訊息
            )
        )
    ));
?>
