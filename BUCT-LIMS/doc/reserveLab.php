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
    <!-- my script -->
    <script src="../bootstrap/js/myscript.js"></script>
    <link rel="stylesheet" href="../bootstrap/bootstrap-datetimepicker.min.css">

</head>

<body>

<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
require_once "../model/Lab_tb_serv.class.php";
require_once "../model/Labreserve_tb_serv.class.php";
?>>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">实验室预约</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form method="post" action="../control/reserveLabProcess.php" onsubmit="return isEmpty_reserveLabDateTimeForm()">

                            <div class="form-group">
                                <label style="float: left;margin-right: 1.5%;">选择日期</label>
                                <div class="input-group date form_date col-md-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" readonly name="reserveLabDate" value="<?php if(!empty($_GET['labreserve_date'])) echo $_GET['labreserve_date']; ?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="float: left;">选择时段</label>
                                <div class="col-md-3">
                                    <select class="form-control" name="reserveLabTime" value="<?php if(!empty($_GET['labreserve_time'])) echo $_GET['labreserve_time']; ?>">
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
                                    <th>实验室编号</th>
                                    <th>实验室名称</th>
                                    <th>实验室等级</th>
                                    <th>所属院系</th>
                                    <th>所属校区</th>
                                    <th>备注</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $lab_tb_serv=new Lab_tb_serv();
                                $res=$lab_tb_serv->getLabList();

                                $labreserve_tb_serv=new Labreserve_tb_serv();
                                $resCheck=$labreserve_tb_serv->getLabIDByDateAndTime($_GET['labreserve_date'],$_GET['labreserve_time']);
                                if(isset($_GET['resCheck'])){
                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];

                                        for ($j = 0; $j < count($resCheck); $j++) {

                                            $rowCheck = $resCheck[$j];

                                            if ($row['lab_id'] == $rowCheck['labreserve_lab_id']) {
                                                break;
//                                                echo "<script>alert('{$rowCheck['labreserve_lab_id']}');</script>";
                                            }
                                        }

                                        echo "<tr class='gradeX'>
<td><a href='../doc/inquireLabInfo.php?lab_id={$row['lab_id']}'>{$row['lab_id']}</td>
<td>{$row['lab_name']}</td>
<td>{$row['lab_grade']}</td>
<td>{$row['lab_college']}</td>
<td>{$row['lab_zone']}</td>
<td>";
                                        if ($j < count($resCheck)) {
                                            echo "已被预约";
                                        }
                                        else {
                                            echo "<a href='../doc/reserveLabMakeTable.php?lab_id={$row['lab_id']}&lab_name={$row['lab_name']}&labreserve_date={$_GET['labreserve_date']}&labreserve_time={$_GET['labreserve_time']}' class='btn btn-info btn-xs'>预约</a></td></tr>";
                                        }
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
        startDate:new Date()
    });
</script>

</body>
</html>
