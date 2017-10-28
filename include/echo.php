$client->replyMessage(array(
    'replyToken' => $event['replyToken'],
    'messages' => array(
        array(
    	    'type' => 'text',
            'text' => $message['text'].'，大家好，歡迎來到測試'
        )
    )
)); //回話