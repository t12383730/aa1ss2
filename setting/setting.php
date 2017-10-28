if (file_exists(__DIR__ . '/config.php')) {
    $config = include __DIR__ . '/config.php'; // �ޤJ�]�w��
    if ($config['channelAccessToken'] == Null || $config['channelSecret'] == Null) {
        error_log("config.php �]�w�ɤ��������v���M�����M���s���v���|���]�w�����I", 0); // ��X���~
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
    fwrite($configFile, $configFileContent); // �إߤ��üg�J
    fclose($configFile); // �������
    error_log("config.php �]�w�ɫإߦ��\�A�нs���ɮ׿�J�����v���M�����M���s���v���I", 0); // ��X���~
}