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

    <!-- my script -->
    <script src="../bootstrap/js/myscript.js"></script>
</head>

<body>

<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
if(isset($_SESSION['login_err'])) {
    if ($_SESSION['login_err'] == 5) {
        echo "<script type='text/javascript'>alert('当前用户已在线！')</script>";
    }
    unset($_SESSION['login_err']);
}
if(isset($_SESSION['exceptHandle_userLoginStatus_err'])){
    if ($_SESSION['exceptHandle_userLoginStatus_err']==1){
        echo "<script type='text/javascript'>alert('验证码错误！')</script>";
    }elseif ($_SESSION['exceptHandle_userLoginStatus_err']==4){
        echo "<script type='text/javascript'>alert('当前用户正在审核中！')</script>";
    }elseif ($_SESSION['exceptHandle_userLoginStatus_err']==5){
        echo "<script type='text/javascript'>alert('当前用户审未通过中！')</script>";
    }elseif ($_SESSION['exceptHandle_userLoginStatus_err']==6){
        echo "<script type='text/javascript'>alert('用户名或密码错误！')</script>";
    }
    unset($_SESSION['exceptHandle_userLoginStatus_err']);
}

?>
<div class='content-wrapper'>
    <div class='container'>

        <div class='row pad-botm'>
            <div class='col-md-12'>
                <h4 class='header-line'>登录异常处理</h4>
            </div>
        </div>

        <div class='row'>
            <div class='col-md-3'>
                <div class='alert alert-danger' >
                    <strong>ALERT EXAMPLE :</strong>
                    <p>欢迎大家使用：</p>
                    <p>您刚刚登录的账户登录已在线上，可能是您上次登录未正常退出，或者是您登录期间系统出现死机问题，通过强制下线功能可以恢复您的账户。</p>
                </div>
            </div>

            <!--确认用户-->
            <div class='col-md-9 loginOptionsCon' id=''>
                <div class='panel panel-info'>

                    <div class='panel-body'>
                        <form role='form' id='exceptHandle_userLoginStatusForm' action='../control/exHand_userLogStaProcess.php' method='post' onsubmit='return isEmpty_exceptHandle_userLoginStatus();'>
                            <div class='form-group'>
                                <label>学号/工号</label>
                                <input class='form-control user_id' type='text' name='exceptHandle_loginUserId'/>
                            </div>
                            <div class='form-group'>
                                <label>密码</label>
                                <input class='form-control user_password' type='password' name='exceptHandle_loginUserPassword'/>
                            </div>
                            <div class='form-group'>
                                <label>验证码</label><br>
                                <input class='form-control-min checkCode' type='text' name='exceptHandle_loginCheckCode' maxlength='4'/>
                                <img src='../frame/checkCode.php'
                                     onclick='this.src='../frame/checkCode.php?aa='+Math.random()' title='点击刷新'/>
                            </div>
                            <button type='submit' class='btn btn-info'>确认下线</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>";

<?php require_once "../frame/footer.php";  ?>

<!-- CORE JQUERY  -->
<script src="../bootstrap/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="../bootstrap/js/custom.js"></script>


</body>
</html>
