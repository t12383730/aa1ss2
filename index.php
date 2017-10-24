<?php
/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
require_once('./LINEBotTiny.php');
$channelAccessToken = getenv('LINE_CHANNEL_ACCESSTOKEN');
$channelSecret = getenv('LINE_CHANNEL_SECRET');
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                	$m_message = $message['text'];
                	if($m_message!=""){
                		$client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $m_message.' 測試',
                            )
                        )
                    	));
                	}
                    if (strtolower($message['text']) == "buttons template" || $message['text'] == "按鈕模板"){
                        $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                             'type' => 'template', // 訊息類型 (模板)
                             'altText' => 'Example buttons template', // 替代文字
                             'template' => array(
                                 'type' => 'buttons', // 類型 (按鈕)
                                 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                                'title' => 'Example Menu', // 標題 <不一定需要>
                                'text' => 'Please select', // 文字
                                'actions' => array(
                                     array(
                                        'type' => 'postback', // 類型 (回傳)
                                        'label' => 'Postback example', // 標籤 1
                                        'data' => 'action=buy&itemid=123' // 資料
                                     ),
                                    array(
                                        'type' => 'message', // 類型 (訊息)
                                        'label' => 'Message example', // 標籤 2
                                        'text' => 'Message example' // 用戶發送文字
                                    ),
                                    array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Uri example', // 標籤 3
                                    'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                                    )
                                )
                            )
                        )
                    )
                ));
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
