<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>实验室管理系统</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../bootstrap/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../bootstrap/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script src="../bootstrap/js/myscript.js"></script>
</head>

<body>
<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
require_once "../model/Notice_tb_serv.class.php";
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">公告详情</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">


<?php

if(!empty($_GET['notice_id'])){
    $notice_tb_serv=new Notice_tb_serv();
    $notice_id=$_GET['notice_id'];
    $res=$notice_tb_serv->getNoticeInfoById($notice_id);
}

?>

                    <div class="panel-heading">标题：
                        <?php if(!empty($_GET['notice_id'])) echo $res->getNoticeTitle(); ?>
                    </div>

                    <div class="panel-body">
                        <p><?php if(!empty($_GET['notice_id']))  echo $res->getNoticeContent(); ?></p>
                    </div>

                    <div class="panel-footer">时间：
                        <?php if(!empty($_GET['notice_id'])) echo $res->getNoticeTime(); ?>
                    </div>

                    <div class="panel-body">
                        <input type="button" class="btn btn-primary" onclick="history.go(-1);" value="返回">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "../frame/footer.php"; ?>
<!-- CORE JQUERY  -->
<script src="../bootstrap/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="../bootstrap/js/custom.js"></script>

</body>
</html>


