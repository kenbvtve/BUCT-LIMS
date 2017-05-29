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
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">实验室查询</h4>
            </div>
        </div>


        <!-- 显示区-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">实验室信息</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>实验室编号</th>
                                    <th>实验室名称</th>
                                    <th>实验室等级</th>
                                    <th>所属院系</th>
                                    <th>所属校区</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>

<?php
$lab_tb_serv=new Lab_tb_serv();
$res=$lab_tb_serv->getLabList();

for ($i=0;$i<count($res);$i++) {
    $row = $res[$i];
    $j=$i+1;
    echo "<tr class='gradeX'><td>$j</td><td><a href='inquireLabInfo.php?lab_id={$row['lab_id']}'>{$row['lab_id']}</td><td>{$row['lab_name']}</td><td>{$row['lab_grade']}</td><td>{$row['lab_college']}</td><td>{$row['lab_zone']}</td><td>{$row['lab_status']}</td></tr>";
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>
        </div>
    </div>
</div>

<?php  require_once "../frame/footer.php"; ?>
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
