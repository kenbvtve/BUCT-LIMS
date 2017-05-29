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
if(isset($_SESSION['login_err'])){
    if($_SESSION['login_err']==1) {
        echo "<script type='text/javascript'>alert('验证码错误！')</script>";
    }elseif ($_SESSION['login_err']==2){
        echo "<script type='text/javascript'>alert('账户注册审核中！')</script>";
    }elseif ($_SESSION['login_err']==3){
        echo "<script type='text/javascript'>alert('账户审核未通过！')</script>";
    }elseif ($_SESSION['login_err']==4){
        echo "<script type='text/javascript'>alert('账户或密码错误！')</script>";
    }elseif ($_SESSION['login_err']==5){
        echo "<script type='text/javascript'>alert('当前用户已在线！')</script>";
    }
    unset($_SESSION['login_err']);
}

if(isset($_SESSION['sign_err'])){
    if ($_SESSION['sign_err']==1){
        echo "<script type='text/javascript'>alert('验证码错误！')</script>";
    }elseif ($_SESSION['sign_err']==2) {
        echo "<script type='text/javascript'>alert('当前用户 学号、工号已存在！')</script>";
    }elseif ($_SESSION['sign_err']==3) {
        echo "<script type='text/javascript'>alert('注册成功，等待审核！')</script>";
    }elseif ($_SESSION['sign_err']==4){
        echo "<script type='text/javascript'>alert('注册失败！')</script>";
    }
    unset($_SESSION['sign_err']);
}

if(isset($_SESSION['resExit'])){
    if ($_SESSION['resExit']==1){
        echo "<script type='text/javascript'>alert('退出成功！')</script>";
    }
    unset($_SESSION['resExit']);
}

if (isset($_SESSION['exceptHandle_userLoginStatus_err'])){
    if ($_SESSION['exceptHandle_userLoginStatus_err']==2){
        echo "<script type='text/javascript'>alert('用户已成功下线，重新登录！')</script>";
    }elseif ($_SESSION['exceptHandle_userLoginStatus_err']==3){
        echo "<script type='text/javascript'>alert('用户不在线上，请登录！')</script>";
    }
    unset($_SESSION['exceptHandle_userLoginStatus_err']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a class="menu-top-active">登录</a></li>
                            <li><a class="">注册</a></li>
                            <li><a class="">忘记密码</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--登录-->
            <div class="col-md-9 loginOptionsCon" id="">
                <div class="panel panel-info">

                    <div class="panel-body">
                        <form role="form" id="loginForm" action="../control/loginProcess.php" method="post" onsubmit="return isEmpty_loginForm();">
                            <div class="form-group">
                                <label>学号/工号</label>
                                <input class="form-control user_id" type="text" name="login_user_id"/>
                            </div>
                            <div class="form-group">
                                <label>密码</label>
                                <input class="form-control user_password" type="password" name="login_user_password"/>
                            </div>
                            <div class="form-group">
                                <label>验证码</label><br>
                                <input class="form-control-min checkCode" type="text" name="login_checkCode" maxlength="4"/>
                                <img src="../frame/checkCode.php"
                                     onclick="this.src='../frame/checkCode.php?aa='+Math.random()" title="点击刷新"/>
                            </div>
                            <button type="submit" class="btn btn-info">确认登录</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9 loginOptionsCon" id="">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" id="signForm" action="../control/signProcess.php" method="post" onsubmit="return isEmpty_signForm();">

                            <div class="form-group">
                                <label>学号/工号</label>
                                <input class="form-control" type="text" name="sign_user_id"/>
                            </div>

                            <div class="form-group">
                                <label>身份类型</label>
                                <select class="form-control" name="sign_user_type">
                                    <option value="3">学生</option>
                                    <option value="2">老师</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" type="text" name="sign_user_name"/>
                            </div>

                            <div class="form-group">
                                <label>学院</label>
                                <select class="form-control" name="sign_user_college">
                                    <option value="材料学院"> 材料学院</option>
                                    <option value="化工学院"> 化工学院</option>
                                    <option value="信息学院"> 信息学院</option>
                                    <option value="机械学院"> 机械学院</option>
                                    <option value="文法学院"> 文法学院</option>
                                    <option value="经管学院"> 经管学院</option>
                                    <option value="生命学院"> 生命学院</option>
                                    <option value="理学院"> 理学院</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>电话</label>
                                <input class="form-control" type="text" name="sign_user_phone" maxlength="11"/>
                            </div>

                            <div class="form-group">
                                <label>邮箱</label>
                                <input class="form-control" type="text" name="sign_user_mail"/>
                            </div>

                            <div class="form-group">
                                <label>密码</label>
                                <input class="form-control" type="password" name="sign_user_password"/>
                            </div>

                            <div class="form-group">
                                <label>确认密码</label>
                                <input class="form-control" type="password" name="sign_user_password"/>
                            </div>

                            <div class="form-group">
                                <label>验证码</label><br>
                                <input class="form-control-min" type="text" name="sign_checkCode" maxlength="4"/>
                                <img src="../frame/checkCode.php"
                                     onclick="this.src='../frame/checkCode.php?aa='+Math.random()"
                                     title="点击刷新"/>
                            </div>

                            <button type="submit" class="btn btn-info">确认注册</button>
                        </form>
                    </div>
                </div>
            </div>

            <!--找回密码-->
            <div class="col-md-9 loginOptionsCon" id="">
                <div class="jumbotron">
                    <h1>Notice</h1>
                    <p>忘记密码请直接与实验室办公室联系</p>
                    <p>电话 010-6443xxxx</p>
                    <p>邮箱 center@buct.edu.cn</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once "../frame/footer.php";  ?>

<!-- CORE JQUERY  -->
<script src="../bootstrap/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="../bootstrap/js/custom.js"></script>


</body>
</html>
