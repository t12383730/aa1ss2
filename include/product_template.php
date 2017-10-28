<?php
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
                        )
                    )
                )
            )
        )
    ));
?>
