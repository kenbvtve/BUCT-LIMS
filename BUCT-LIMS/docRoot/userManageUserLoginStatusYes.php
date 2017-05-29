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
require_once "../model/User_tb_serv.class.php";
if (isset($_SESSION['userManageUserLoginStatusYesProcess_err'])){
    switch ($_SESSION['userManageUserLoginStatusYesProcess_err']){
        case 1:case 3:
            echo "<script type='text/javascript'>alert('操作成功！');</script>";
            break;
        case 2:case 4:
            echo "<script type='text/javascript'>alert('发生未知错误，请重新尝试！');</script>";
            break;
    }
    unset($_SESSION['userManageUserLoginStatusYesProcess_err']);
}

?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">用户列表</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="userManageUserAll.php">所有用户</a></li>
                            <li><a href="userManageUserStatusYes.php">审核通过用户</a></li>
                            <li><a href="userManageUserStatusNo.php">被拒绝用户</a></li>
                            <li><a href="userManageUserLoginStatusYes.php" class="menu-top-active">在线用户</a></li>
                            <li><a href="userManageUserStu.php">学生用户</a></li>
                            <li><a href="userManageUserTea.php">老师用户</a></li>
                            <li><a href="userManageUserRoot.php">管理员用户</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        在线用户
                        <a onclick="return confirm('确认全部强制离线？');" href='../control/userManageUserLoginStatusYesProcess.php?flag=2' class='btn btn-primary btn-xs'>全部强制离线</a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>学号/工号</th>
                                    <th>用户类型</th>
                                    <th>用户姓名</th>
                                    <th>所属学院</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //获取未通过审核用户信息
                                if (isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    $user_tb_serv=new User_tb_serv();
                                    $res=$user_tb_serv->getUserListByLoginStatus(1);

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;
                                        switch ($row['user_type']){
                                            case 1:$userType="管理员";break;
                                            case 2:$userType="老师";break;
                                            case 3:$userType="学生";break;
                                        }
                                        echo "<tr class='gradeX'><td>$j</td><td>{$row['user_id']}</td><td>$userType</td><td>{$row['user_name']}</td><td>{$row['user_college']}</td></td><td><a onclick=\"return confirm('确认强制离线？');\" href='../control/userManageUserLoginStatusYesProcess.php?flag=1&user_id={$row['user_id']}' class='btn btn-danger btn-xs'>强制离线</a></td></tr>";
                                    }
                                }
                                else{
                                    echo "<script type='text/javascript'>alert('非法用户,无权限查看任何信息！');</script>";
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
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
