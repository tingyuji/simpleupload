<?php
date_default_timezone_set('PRC');
setlocale(LC_ALL, 'zh_CN.utf-8');
header("Content-Type:text/html;charset=utf-8");

require_once 'class/log.class.php';
$logClass= new logClass();

$page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$action = '图床1';
$logClass->add($page,$action);


require_once 'qiniu/autoload.php';

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

$bucket = 'wxfb';
$accessKey = 'nIRzQejxrqHcD8JZSFfLQvRhmuf28mHzZuufsdib';
$secretKey = 'y9-kNiD0mR-mhqLaFWYjlmAoQQ79c8_XNF8ByisH';
$auth = new Auth($accessKey, $secretKey);


//$upToken = $auth->uploadToken($bucket);

$policy = array(
    'returnUrl' => 'http://www.fangdan8.com/softsoft/fileinfo.php',
    'returnBody' => '{"fname": $(fname)}',
);
$upToken = $auth->uploadToken($bucket, null, 3600, $policy);


$i = rand(0,9999);
$key = date('YmdHis').str_pad($i,3,'0',STR_PAD_LEFT).'.jpg';

session_start();
$_SESSION['filename']=$key;

?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>图床-简单、易用，让您的图片马上上线吧</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="图床">
    <meta name="Keywords" content="图床">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

 
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">图床</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php">首页</a></li>
              <li class="active"><a href="qiniu.php">图床①</a></li>
              <li><a href="soft.php">图床②</a></li>
              <li><a target="_blank" href="http://tu.woyao998.com/fabu/index.php">图床③</a></li>
              <li><a href="about.php">关于我们</a></li>
              <li><a href="contact.php">联系我们</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
  

      <div class="page-header">
          <p class="panel-title">
          
          <br>简单、易用，让您的图片马上上线吧
          <br>

          </p>
      </div>
      <form action="http://up.qiniu.com" method="post" enctype="multipart/form-data" >
          <div class="form-group" style="display:none;">
                <input id="id_token" name="token" type="text" value="<?php echo $upToken ?>" />
          </div>
          <div class="form-group" style="display:none;">
                <input id="id_key" name="key" type="text" value="<?php echo $key ?>" />
          </div>

          <div class="form-group col-sm-6" style="height:25px;">
              <label for="file">请先选择要上传的文件，然后点击上传：</label>
              <input id="id_file" name="file" class="form-control" type="file" />
          </div>
          <br>
          <hr>
          <div class="form-group">
              <input type="submit" class="btn btn-default" value="上传"/>
          </div>
          
      </form>



    </div> <!-- /container -->




</body>
</html>
