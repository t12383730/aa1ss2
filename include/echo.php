<?php
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // �T������ (��r)
                'text' => '�w��Ө���աA��J1:�w��T���A��J2:�������e' // �^�_�T��
            )
        )
    ));
?>