<?php

require_once 'class/log.class.php';
$logClass= new logClass();

$page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$action = '首页';
$logClass->add($page,$action);
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
              <li class="active"><a href="index.php">首页</a></li>
              <li><a href="qiniu.php">图床①</a></li>
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

<!-- 
      <div>
        <ul class="thumbnails" id="thumbnails">
          <li class="span4" style="width:160px;height:160px;">
            <a href="#" class="thumbnail">
              <img style="width:160px;height:160px;" src="images/IMG001.jpeg" alt="">
            </a>
          </li>
        </ul>

      </div>
 -->

    <!-- UY BEGIN -->
    <!--
    <div id="uyan_frame"></div>
    <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=2126230"></script>
    -->
    <!-- UY END -->

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>



</body>
</html>
