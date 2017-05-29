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
require_once "../model/Equip_tb_serv.class.php";
require_once "../model/Equiptype_tb_serv.class.php";
?>>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">设备预约</h4>
            </div>
        </div>

        <!-- 显示区-->
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">设备预约表单</div>

                    <div class="panel-body">
                        <form method="post" action="../control/reserveEquipProcess.php" onsubmit="return isEmpty_reserveEquipDateTimeForm()">

                            <table class="table table-bordered">

                                <tr><td colspan="4"><label>预约时间</label><span style="color: red;">*</span></td></tr>
                                <tr>
                                    <td>选择日期</td>
                                    <td>
                                        <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="16" type="text" readonly name="reserveEquip_date" value="<?php if(!empty($_GET['labreserve_date'])) echo $_GET['labreserve_date']; ?>">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </td>

                                    <td>选择时间段</td>
                                    <td>
                                        <select class="form-control" name="reserveEquip_time" value="<?php if(!empty($_GET['labreserve_time'])) echo $_GET['labreserve_time']; ?>">
                                            <option value="08:00-12:00">08:00-12:00</option>
                                            <option value="13:00-17:00">13:00-17:00</option>
                                            <option value="18:00-22:00">18:00-22:00</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr><td colspan="4"><label>预约人信息<span style="color: red;">*</span></label></td></tr>
                                <tr>
                                    <td>姓名</td>
                                    <td><input type="text" name="reserveEquip_perName" class="form-control" readonly value="<?php if(isset($_SESSION['login_userName'])) echo $_SESSION['login_userName']; ?>"></td>
                                    <td>学号/工号</td>
                                    <td><input type="text" name="reserveEquip_perId" class="form-control" readonly value="<?php if (isset($_SESSION['login_userId'])) echo $_SESSION['login_userId']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>手机号码</td>
                                    <td><input type="text" class="form-control" name="reserveEquip_perPhone"></td>
                                    <td>邮箱</td>
                                    <td><input type="text" class="form-control" name="reserveEquip_perMail"></td>
                                </tr>

                                <tr>
                                    <td>预约设备</td>
                                    <td colspan="3">
                                        <select class="form-control" name="reserveEquip_equip">
                                            <?php
                                            $equiptype_tb_serv=new Equiptype_tb_serv();
                                            $resEquip=$equiptype_tb_serv->getEquiptypeTbInfo();
                                            for ($i=0;$i<count($resEquip);$i++) {
                                                $row = $resEquip[$i];
                                                echo "<option value='{$row['equiptype_name']}'>{$row['equiptype_name']}</option>";
                                            }
                                            ?>>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>预约原因</td>
                                    <td colspan="3" rowspan="10">
                                        <textarea class="form-control" rows="10" name="reserveEquip_reason"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" class="btn btn-info"  value="确认预约" />
                        </form>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>

            <div class="col-md-3">
                <div class="alert alert-danger" >
                    <strong>ATTENTION</strong>
                    <p>带<span style="color: red">*</span>的为必填项，请补充完成再提交。</p>
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
        startDate:new Date()
    });
</script>

</body>
</html>
