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
                            <li><a href="../docStu/inquireScheduleLabAndDate.php">实验室与日期</a></li>
                            <li><a href="../docStu/inquireScheduleDateAndTime.php" class="menu-top-active">日期与时间段</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form method="post" action="../control/inquireScheduleByWayProcess.php?way=datetime" onsubmit="return isEmpty_reserveLabDateTimeForm()">

                            <div class="form-group">
                                <label style="float: left;margin-right: 1.5%;">选择日期</label>
                                <div class="input-group date form_date col-md-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" readonly name="inquireScheduleDate" value="<?php if(!empty($_GET['labreserve_date'])) echo $_GET['labreserve_date']; ?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="float: left;">选择时段</label>
                                <div class="col-md-3">
                                    <select class="form-control" name="inquireScheduleTime" value="<?php if(!empty($_GET['labreserve_time'])) echo $_GET['labreserve_time']; ?>">
                                        <option value="08:00-12:00">08:00-12:00</option>
                                        <option value="13:00-17:00">13:00-17:00</option>
                                        <option value="18:00-22:00">18:00-22:00</option>
                                    </select>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info"  value="确认查询"  name="submit_check" style="float: right;"/>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">课程信息</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>预约编号</th>
                                    <th>实验室编号</th>
                                    <th>实验室名称</th>
                                    <th>日期</th>
                                    <th>时间段</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($_GET['resCheck'])){
                                    $labrserve_tb_serv=new Labreserve_tb_serv();
                                    $lab_tb_serv=new Lab_tb_serv();

                                    $resLabReserve=$labrserve_tb_serv->getLabIDByDateAndTimeANDStatus($_GET['labreserve_date'],$_GET['labreserve_time'],2);

                                    for ($i=0;$i<count($resLabReserve);$i++) {
                                        $row = $resLabReserve[$i];

                                        $resName=$lab_tb_serv->getLabById($row['labreserve_lab_id']);

                                        $j=$i+1;

                                        echo "<tr class='gradeX'>
<td>$j</td>
<td>{$row['labreserve_id']}</td>
<td>{$row['labreserve_lab_id']}</td>
<td>{$resName->getLabName()}</td>
<td>{$_GET['labreserve_date']}</td>
<td>{$_GET['labreserve_time']}</td>
</tr>";
                                    }
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
