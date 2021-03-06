<?php
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'template', // 訊息類型 (模板)
                'altText' => '產品介紹', // 替代文字
                'template' => array(
                    'type' => 'carousel', // 類型 (旋轉木馬)
                    'columns' => array(
                        array(
                            'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => '益母草素', // 標題 1 <不一定需要>
                            'text' => '九龍齋益母草素', // 文字 1
                            'actions' => array(
                                array(
                                    'type' => 'postback', // 類型 (回傳)
                                    'label' => '立即訂購', // 標籤 1
                                    'data' => 'action=buy&itemid=123' // 資料
                                ),
                                array(
                                    'type' => 'message', // 類型 (訊息)
                                    'label' => '訊息回傳', // 標籤 2
                                    'text' => '訊息回傳' // 用戶發送文字
                                ),
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => '查看更多', // 標籤 3
                                    'uri' => 'https://vinegar.000webhostapp.com/' // 連結網址
                                )
                            )
                        ),
                        array(
                            'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => '加州黑蜜棗', // 標題 2 <不一定需要>
                            'text' => '九龍齋加州黑蜜棗', // 文字 2
                            'actions' => array(
                                array(
                                    'type' => 'postback', // 類型 (回傳)
                                    'label' => '立即訂購', // 標籤 1
                                    'data' => 'action=buy&itemid=123' // 資料
                                ),
                                array(
                                    'type' => 'message', // 類型 (訊息)
                                    'label' => '訊息回傳', // 標籤 2
                                    'text' => '訊息回傳' // 用戶發送文字
                                ),
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => '查看更多', // 標籤 3
                                    'uri' => 'https://github.com/t12383730/aa1ss2/blob/master/index.php' // 連結網址
                                )
                            )
                        )
                    )
                )
            )
        )
    ));
?>
