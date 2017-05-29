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
    <link rel="stylesheet" href="../bootstrap/bootstrap-datetimepicker.min.css">

</head>
<body>
<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
require_once "../model/Lab_tb_serv.class.php";
require_once "../model/Labreserve_tb_serv.class.php";
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">课表查询</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a><strong style="color: #000000;">查询方式</strong></a></li>
                            <li><a href="../docStu/inquireScheduleLabAndDate.php"  class="menu-top-active">实验室与日期</a></li>
                            <li><a href="../docStu/inquireScheduleDateAndTime.php">日期与时间段</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form method="post" action="../control/inquireScheduleByWayProcess.php?way=datelab">

                            <div class="form-group">
                                <label style="">实验室编号</label>
                                <input type="text" class="form-control" name="inquireScheduleLab" value="<?php if (!empty($_GET['labreserve_lab_id'])) echo $_GET['labreserve_lab_id']; ?>">
                            </div>

                            <div class="form-group">
                                <label style="">开始日期</label>
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" readonly  id="datetimepicker6" name="inquireScheduleDateStart" value="<?php if(!empty($_GET['labreserve_date_start'])) echo $_GET['labreserve_date_start']; ?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="">结束日期</label>
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" readonly id="datetimepicker7" name="inquireScheduleDateEnd" value="<?php if(!empty($_GET['labreserve_date_end'])) echo $_GET['labreserve_date_end']; ?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info"  value="确认查询"  name="submit_check" style="float: right;"/>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">课程信息</div>

<!--                    <div class="panel-body">-->
<!--                        <div class="table-responsive">-->
<!--                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">-->
<!--                                <thead>-->
<!--                                <tr>-->
<!--                                    <th>实验室编号</th>-->
<!--                                    <th>实验室名称</th>-->
<!--                                    <th>实验室等级</th>-->
<!--                                    <th>所属院系</th>-->
<!--                                    <th>所属校区</th>-->
<!--                                    <th>备注</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!---->
<!--                                --><?php
//                                if (isset($_GET['resCheck'])){
//                                    $labrserve_tb_serv=new Labreserve_tb_serv();
//                                    $lab_tb_serv=new Lab_tb_serv();
//
//                                    $resLabReserve=$labrserve_tb_serv->getLabIDByDateAndLabIdANDStatus($_GET['labreserve_date'],$_GET['labreserve_lab_id'],2);
//
//                                    for ($i=0;$i<count($resLabReserve);$i++) {
//                                        $row = $resLabReserve[$i];
//
//                                        $resName=$lab_tb_serv->getLabById($row['labreserve_lab_id']);
//
//                                        $j=$i+1;
//
//                                        echo "<tr class='gradeX'>
//<td>$j</td>
//<td>{$row['labreserve_id']}</td>
//<td>{$row['labreserve_lab_id']}</td>
//<td>{$resName->getLabName()}</td>
//<td>{$_GET['labreserve_date']}</td>
//<td>{$_GET['labreserve_time']}</td>
//</tr>";
//                                    }
//                                }
//                                ?>
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>预约日期</th>
                                    <th>预约时段</th>
                                    <th>预约编号</th>
                                </tr>
                                <?php
                                if (isset($_GET['resCheck'])){
                                    $labrserve_tb_serv=new Labreserve_tb_serv();
                                    $lab_tb_serv=new Lab_tb_serv();

                                    $resLabReserve=$labrserve_tb_serv->getLabreserveInfoByLabIdAndDateToDate($_GET['labreserve_lab_id'],$_GET['labreserve_date_start'],$_GET['labreserve_date_end']);

                                    for ($i=0;$i<count($resLabReserve);$i++) {
                                        $row = $resLabReserve[$i];

                                        $resName=$lab_tb_serv->getLabById($_GET['labreserve_lab_id']);

                                        $j=$i+1;

                                        echo "<tr>
                                              <td>{$row['labreserve_date']}</td>
                                              <td>{$row['labreserve_time']}</td>
                                              <td>{$row['labreserve_id']}</td>
                                        </tr>";
                                    }
                                }
                                ?>
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
<script src="../bootstrap/bootstrap-datetimepicker.js"></script>
<script src="../bootstrap/bootstrap-datetimepicker.fr.js"></script>
<script type="text/javascript">
    $('.form_date').datetimepicker({
        language: 'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
//        startDate:new Date()
    });
</script>
</body>
</html>
