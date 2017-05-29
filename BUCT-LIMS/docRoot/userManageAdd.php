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
if (isset($_SESSION['userManageAddUser_err'])){
    if ($_SESSION['userManageAddUser_err']==1){
        echo "<script type='text/javascript'>alert('该用户已存在！');</script>";
    }elseif ($_SESSION['userManageAddUser_err']==2){
        echo "<script type='text/javascript'>alert('恭喜！注册成功！请等待管理员审核。');</script>";
    }elseif ($_SESSION['userManageAddUser_err']==3){
        echo "<script type='text/javascript'>alert('注册失败，发生未知错误！');</script>";
    }elseif ($_SESSION['userManageAddUser_err']==0) {
        echo "<script type='text/javascript'>alert('非法用户，无权操作！');</script>";
    }
    unset($_SESSION['userManageAddUser_err']);
}


?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">添加用户</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="post" action="../control/userManageAddUserProcess.php" id="" onsubmit="return isEmpty_userManageAddUserForm();">
                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" type="text" name="userManageAddUser_name"/>
                            </div>

                            <div class="form-group">
                                <label>学号/工号</label>
                                <input class="form-control" type="text" name="userManageAddUser_perid"/>
                            </div>

                            <div class="form-group">
                                <label>用户类型</label>
                                <select id="" class="form-control" name="userManageAddUser_type">
                                    <option value="1">管理员</option>
                                    <option value="2">老师</option>
                                    <option value="3">学生</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>学院</label>
                                <select id="" class="form-control" name="userManageAddUser_college">
                                    <option value="材料学院">材料学院</option>
                                    <option value="化工学院">化工学院</option>
                                    <option value="信息学院">信息学院</option>
                                    <option value="机械学院">机械学院</option>
                                    <option value="文法学院">文法学院</option>
                                    <option value="经管学院">经管学院</option>
                                    <option value="生命学院">生命学院</option>
                                    <option value="理学院">理学院</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>电话</label>
                                <input class="form-control" type="text" name="userManageAddUser_phone"/>
                            </div>

                            <div class="form-group">
                                <label>邮箱</label>
                                <input class="form-control" type="text" name="userManageAddUser_mail"/>
                            </div>

                            <input type="reset" class="btn btn-default" value="重置" />
                            <input type="submit" class="btn btn-info" value="确认提交" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="alert alert-danger" >
                    <strong>ATTENTION：</strong>
                    <p>管理员注册账户，默认密码一律为123456。</p>
                    <p>注册后用户未启用，请前往用户审核，启用新注册用户。</p>
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
