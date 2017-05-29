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
if (isset($_SESSION['aboutUsNoticeAdd_err'])){
    switch ($_SESSION['aboutUsNoticeAdd_err']){
        case 1:
            echo "<script type='text/javascript'>alert('操作成功！');</script>";
            break;
        case 2:
            echo "<script type='text/javascript'>alert('发生未知错误，请重新尝试！');</script>";
            break;
    }
    unset($_SESSION['aboutUsNoticeAdd_err']);
}

?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">发布公告</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="aboutUsNoticeAdd.php" class="menu-top-active">发布公告</a></li>
                            <li><a href="aboutUsNoticeList.php">公告列表</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <!--   Kitchen Sink -->
                <div class="panel panel-info">
                    <div class="panel-heading">发布公告</div>
                    <div class="panel-body">
                        <form role="form" method="post" action="../control/aboutUsNoticeListProcess.php?flag=2"  onsubmit="return isEmpty_aboutUsNoticeAddNoticeForm();">
                            <div class="form-group">
                                <label>标题</label>
                                <input class="form-control" type="text" name="aboutUsNoticeAdd_title"/>
                            </div>

                            <div class="form-group">
                                <label>内容</label>
                                <textarea class="form-control" name="aboutUsNoticeAdd_content" rows="10"></textarea>
                            </div>
                            <input type="submit" class="btn btn-info" value="确认提交" />
                        </form>
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

<script src="../bootstrap/js/dataTables/jquery.dataTables.js"></script>
<script src="../bootstrap/js/dataTables/dataTables.bootstrap.js"></script>

</body>
</html>
