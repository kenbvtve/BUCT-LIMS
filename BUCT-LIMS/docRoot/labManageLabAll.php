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
require_once "../model/Lab_tb_serv.class.php";
if (isset($_SESSION['labManageLabAllProcess_err'])){
    switch ($_SESSION['labManageLabAllProcess_err']){
        case 1:case 3: case 5:
            echo "<script type='text/javascript'>alert('操作成功！');</script>";
            break;
        case 2:case 4:case 6:
            echo "<script type='text/javascript'>alert('发生未知错误，请重新尝试！');</script>";
            break;
    }
    unset($_SESSION['labManageLabAllProcess_err']);
}

?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">实验室列表</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">所有实验室</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>实验室编号</th>
                                    <th>名称</th>
                                    <th>等级</th>
                                    <th>所属学院</th>
                                    <th>所属校区</th>
                                    <th>备注</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    //获取所有用户信息
                                    $lab_tb_serv=new Lab_tb_serv();
                                    $res=$lab_tb_serv->getLabList();

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;

                                        echo "<tr class='gradeX'>
<td>$j</td>
<td><a href='../doc/inquireLabInfo.php?lab_id={$row['lab_id']}'>{$row['lab_id']}</a></td>
<td>{$row['lab_name']}</td>
<td>{$row['lab_grade']}</td>
<td>{$row['lab_college']}</td>
<td>{$row['lab_zone']}</td>
<td>{$row['lab_status']}</td>
<td><a onclick=\"return confirm('确认删除？');\" href='../control/labManageLabAllProcess.php?flag=1&lab_id={$row['lab_id']}' class='btn btn-danger btn-xs'>删除</a>&nbsp;
<a href='../control/labManageLabAllProcess.php?flag=2&lab_id={$row['lab_id']}&lab_status={$row['lab_status']}' class='btn btn-primary btn-xs'>";

                                        if($row['lab_status']=="正常"){
                                            echo "停用";
                                        }else{
                                            echo "启用";
                                        }

                                        "</a></td></tr>";
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
