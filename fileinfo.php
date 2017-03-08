<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        div {
            width:50%;
            margin:10px 25% auto;
        }
    </style>
</head>
<body>
<div>
     <?php
    // require_once 'class/file.class.php';
    // $fileClass= new fileClass();

    $ret = base64_decode($_GET['upload_ret']);
    $cbody = json_decode($ret, true);
    $dn = 'http://img.fangdan8.com/';

    $dn = 'http://img.fangdan8.com/';
    error_log(print_r($cbody, true));

    session_start();
    // $username=$_SESSION['username'];
    $key=$_SESSION['filename'];
    $url = $dn . $key;

    // $fileClass->add($username,$url);

    
    $stat_ = file_get_contents($url . '?stat');
    $stat = json_decode($stat_, true);
    $mtype = $stat['mimeType'];
    $isImage = substr($mtype, 0, 6) == 'image/'
    ?>
    <p>上传图片的外链：</p>
    <p>
    <input type="text" value=<?=$url?> style="width:450px;font-size:17px;color:#00F;"/>
    </p>
    <p><a href=<?=$url?>>跳转</a></p>
    <p><a href="qiniu.php">返回</a></p>
    <?php  if($isImage) ?>
                    <img src=<?php echo $url ?>  style="border:1px solid #FCD;" alt=""></img>

    
</div>
</body>
</html>

