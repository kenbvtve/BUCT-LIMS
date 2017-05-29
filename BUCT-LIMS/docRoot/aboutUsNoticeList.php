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
if (isset($_SESSION['aboutUsNoticeList_err'])){
    switch ($_SESSION['aboutUsNoticeList_err']){
        case 1:
            echo "<script type='text/javascript'>alert('操作成功！');</script>";
            break;
        case 2:
            echo "<script type='text/javascript'>alert('发生未知错误，请重新尝试！');</script>";
            break;
    }
    unset($_SESSION['aboutUsNoticeList_err']);
}

?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">公告列表</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="aboutUsNoticeAdd.php">发布公告</a></li>
                            <li><a href="aboutUsNoticeList.php" class="menu-top-active">公告列表</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">公告列表</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>公告标题</th>
                                    <th>内容摘要</th>
                                    <th>发布时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    //获取
                                    $notice_tb_serv=new Notice_tb_serv();
                                    $res=$notice_tb_serv->getNoticeListAll();

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;
                                        echo "<tr class='gradeX'><td>$j</td><td>{$row['notice_title']}</td><td>".mb_substr($row['notice_content'],0,10,'utf-8')."</td><td>{$row['notice_time']}</td><td><a onclick=\"return confirm('确认删除？');\" href='../control/aboutUsNoticeListProcess.php?flag=1&notice_id={$row['notice_id']}' class='btn btn-danger btn-xs'>删除</a>&nbsp;<a href='../docRoot/aboutUsNoticeListInfo.php?notice_id={$row['notice_id']}' class='btn btn-primary btn-xs'>详情</a></td></tr>";
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
