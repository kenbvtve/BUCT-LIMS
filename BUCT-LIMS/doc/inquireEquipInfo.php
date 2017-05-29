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

if (!empty($_GET['equip_id'])){
    $equip_tb_serv=new Equip_tb_serv();
    $res=$equip_tb_serv->getEquipById($_GET['equip_id']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">设备查询</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        设备基本信息
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>设备编号</th>
                                    <th>设备名称</th>
                                    <th>设备型号</th>
                                    <th>所属实验室</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td><?php if(!empty($_GET['equip_id'])) echo $res->getEquipId(); ?></td>
                                    <td><?php if(!empty($_GET['equip_id'])) echo $res->getEquipName(); ?></td>
                                    <td><?php if(!empty($_GET['equip_id'])) echo $res->getEquipModel(); ?></td>
                                    <td><?php if(!empty($_GET['equip_id'])) echo $res->getEquipLabId(); ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!--图片展示区-->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="../upload/equip/<?php if(!empty($_GET['equip_id'])) echo $res->getEquipImg(); ?>" alt="暂无图片" />
                        </div>
                    </div>

                </div>
            </div>

            <!--设备信息-->
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        设备简介
                    </div>
                    <div class="panel-body">
                        <p><?php if(!empty($_GET['equip_id'])) echo $res->getEquipDesc(); ?></p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<?php require_once "../frame/footer.php" ?>

<!-- CORE JQUERY  -->
<script src="../bootstrap/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="../bootstrap/js/custom.js"></script>

</body>
</html>
