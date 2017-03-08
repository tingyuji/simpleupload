<?php
date_default_timezone_set('PRC');
setlocale(LC_ALL, 'zh_CN.utf-8');
header("Content-Type:text/html;charset=utf-8");

require_once 'qiniu/autoload.php';

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

$bucket = 'wxfb';
$accessKey = 'xx';
$secretKey = 'xx';
$auth = new Auth($accessKey, $secretKey);


//$upToken = $auth->uploadToken($bucket);

$policy = array(
    'returnUrl' => 'http://www.fangdan8.com/softsoft/fileinfo.php',
    'returnBody' => '{"fname": $(fname)}',
);
$upToken = $auth->uploadToken($bucket, null, 3600, $policy);



echo $upToken;

