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
require_once "../model/Feedback_tb_serv.class.php";
if (isset($_SESSION['aboutUsFeedbackList_err'])){
    switch ($_SESSION['aboutUsFeedbackList_err']){
        case 1:case 3:
        echo "<script type='text/javascript'>alert('操作成功！');</script>";
        break;
        case 2:case 4:
        echo "<script type='text/javascript'>alert('发生未知错误，请重新尝试！');</script>";
        break;
    }
    unset($_SESSION['aboutUsFeedbackList_err']);
}

?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">反馈列表</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        反馈信息列表
                        <a  onclick="return confirm('确认全部删除？')" href="../control/aboutUsFeedbackListProcess.php?flag=1" class="btn btn-info btn-xs">删除全部</a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>反馈人学号/工号</th>
                                    <th>姓名</th>
                                    <th>内容摘要</th>
                                    <th>反馈日期</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    //获取所有反馈信息
                                    $feedback_tb_serv=new Feedback_tb_serv();
                                    $res=$feedback_tb_serv->getFeedbackList();

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;
                                        echo "<tr class='gradeX'><td>$j</td><td>{$row['feedback_perid']}</td><td>{$row['feedback_name']}</td><td>".mb_substr($row['feedback_content'],0,20,'utf-8')."</td><td>{$row['feedback_time']}</td></td><td><a onclick=\"return confirm('确认删除？');\" href='../control/aboutUsFeedbackListProcess.php?flag=2&feedback_id={$row['feedback_id']}' class='btn btn-danger btn-xs'>删除</a>&nbsp;<a href='../docRoot/aboutUsFeedbackListInfo.php?feedback_id={$row['feedback_id']}' class='btn btn-primary btn-xs'>详情</a></td></tr>";
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
