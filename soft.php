<?php
require_once 'class/log.class.php';
$logClass= new logClass();

$page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$action = '图床2';
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

    <script src="jquery.js"></script>


    <script type="text/javascript">
        $(function () {
       
            $('#uploadInput').change(function () {
                var file = this.files[0];
                //判断类型是不是图片  
                if (!/image\/\w+/.test(file.type)) {
                    alert("请确保文件为图像类型");
                    return false;
                }

                var reader = new FileReader();
                reader.onload = function () {
                    // 通过 reader.result 来访问生成的 DataURL
                    var url = reader.result;

                };
                reader.readAsDataURL(file);

                reader.onload = function (e) {
                    $.ajax({
                        url: "upload.php",
                        type: "POST",
                        data: { "image": "" + this.result + "", "imgtype": 1 },
                   
                        success: function (data) {

                            if (data.status == "1") {
                                $("#divimg").html('<img style="width:200px;height:300px;border:1px solid #FCD;" src="' + data.path + '"/>');
                                // $("#imgfile").val(data.path).attr("readOnly", "true");
                                $("#imgfile").val(data.path);
                               
                            } else {
                             
                                setTimeout(function () {
                                    f.close().remove();

                                }, 1000);
                            }




                        }, dataType: "json"
                    });
                }
            });

        })

    </script>
 
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
              <li><a href="qiniu.php">图床①</a></li>
              <li class="active"><a href="soft.php">图床②</a></li>
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

      <div class="form-group">
          <label for="disabledinput" id="showtypeimg" class="col-sm-3 control-label">请先选择要上传的文件</label>
          <div class="form-group col-sm-6" >

              <input type="text" name="imgfile" id="imgfile" style="height:25px;width:100%;"  sucmsg=" " class=" form-control left">
          </div>
          <div class="form-group col-sm-6" style="height:25px;">    
              <input id="uploadInput" type="file" class="left" value="upload">

          </div>
          <hr>
          <div class="form-group">   
              <br>
              <p id="divimg"></p>
          </div>

      </div>



    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
