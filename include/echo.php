<?php
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // �T������ (��r)
                'text' => '�w��Ө����\n��J1:�w��T��\n��J2:�������e' // �^�_�T��
            )
        )
    ));
?>