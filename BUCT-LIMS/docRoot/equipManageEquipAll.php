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
require_once "../model/Equip_tb_serv.class.php";
if (isset($_SESSION['equipManageEquipAllProcess_err'])){
    switch ($_SESSION['equipManageEquipAllProcess_err']){
        case 1:
            echo "<script type='text/javascript'>alert('操作成功！');</script>";
            break;
        case 2:
            echo "<script type='text/javascript'>alert('发生未知错误，操作失败！');</script>";
            break;
    }
    unset($_SESSION['equipManageEquipAllProcess_err']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">设备列表</h4>
            </div>
        </div>


        <!-- 显示区-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">设备信息</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>设备编号</th>
                                    <th>设备名称</th>
                                    <th>设备型号</th>
                                    <th>所属实验室</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $equip_tb_serv=new Equip_tb_serv();
                                $res=$equip_tb_serv->getEquipList();

                                for ($i=0;$i<count($res);$i++) {
                                    $row = $res[$i];
                                    $j=$i+1;
                                    echo "<tr class='gradeX'>
<td>$j</td>
<td><a href='../doc/inquireEquipInfo.php?equip_id={$row['equip_id']}'>{$row['equip_id']}</td>
<td>{$row['equip_name']}</td><td>{$row['equip_model']}</td><td>{$row['equip_lab_id']}</td><td>{$row['equip_status']}</td>
<td><a onclick=\"return confirm('确认删除？')\" href='../control/equipManageEquipAllProcess.php?flag=1&equip_id={$row['equip_id']}' class='btn btn-danger btn-xs'>删除</a></td>
</tr>";
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
