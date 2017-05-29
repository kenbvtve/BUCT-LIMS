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
if(isset($_SESSION['aboutFeedback'])){
    if ($_SESSION['aboutFeedback']==1){
        echo "<script type='text/javascript'>alert('反馈成功，感谢来信！')</script>";
    }
    unset($_SESSION['aboutFeedback']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">联系我们</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="post" action="../control/infoback_subProcess.php" id="" onsubmit="return isEmpty_infobacksubForm()">
                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" type="text" name="feedbacksub_name"/>
                            </div>

                            <div class="form-group">
                                <label>学号/工号</label>
                                <input class="form-control" type="text" name="feedbacksub_perid"/>
                            </div>

                            <div class="form-group">
                                <label>电话</label>
                                <input class="form-control" type="text" name="feedbacksub_phone"/>
                            </div>

                            <div class="form-group">
                                <label>邮箱</label>
                                <input class="form-control" type="text" name="feedbacksub_mail"/>
                            </div>

                            <div class="form-group">
                                <label>内容</label>
                                <textarea class="form-control" rows="3" name="feedbacksub_content"></textarea>
                            </div>

                            <input type="reset" class="btn btn-default" value="重置" />
                            <input type="submit" class="btn btn-info" value="确认提交" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="alert alert-danger" >
                    <strong>ALERT EXAMPLE :</strong>
                    <p>     该反馈机制，旨在为同学们和老师们提供机会，在实验室管理或系统完善方面提出自己的观点。</p>
                    <p>     欢迎大家踊跃提出自己的观点。</p>
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
