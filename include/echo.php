<?php
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // �T������ (��r)
                'text' => 'Hello, world!' // �^�_�T��
            )
        )
    ));
?>