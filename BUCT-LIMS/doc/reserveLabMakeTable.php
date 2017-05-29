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
                    <div class='panel-body'>
                        <form role='form' method='post' action='../control/reserveLabMakeTableProcess.php' onsubmit='return isEmpty_reserveLabMakeTableForm();'>
                            <table class='table table-bordered table-responsive'>
                                <tr>
                                    <td><label>实验室编号</label></td>
                                    <td colspan='3'>
                                        <input class='form-control' type='text' readonly name='reserveLabMakeTable_labId' value="<?php if(isset($_GET['lab_id'])) echo $_GET['lab_id']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>实验室名称</label></td>
                                    <td colspan='3'>
                                        <input class='form-control' type='text' readonly name='reserveLabMakeTable_labName' value="<?php if(isset($_GET['lab_name'])) echo $_GET['lab_name']; ?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>预约日期</label></td>
                                    <td>
                                        <input class='form-control' type='text' readonly name='reserveLabMakeTable_date' value="<?php if (isset($_GET['labreserve_date'])) echo $_GET['labreserve_date']; ?>">
                                    </td>
                                    <td><label>预约时段</label></td>
                                    <td>
                                        <input class='form-control' type='text' readonly name='reserveLabMakeTable_time' value="<?php if (isset($_GET['labreserve_time'])) echo $_GET['labreserve_time']; ?>">
                                    </td>
                                </tr>

                                <tr><td colspan='4'>预约人基本信息<span style='color: red;'>(必填项)</span></td></tr>

                                <tr>
                                    <td><label>姓名</label></td>
                                    <td>
                                        <input class='form-control' type='text' readonly name='reserveLabMakeTable_perName' value="<?php if (isset($_SESSION['login_userName'])) echo $_SESSION['login_userName'];  ?>"/>
                                    </td>
                                    <td><label>学号</label></td>
                                    <td>
                                        <input class='form-control' type='text' readonly name='reserveLabMakeTable_perId' value="<?php if (isset($_SESSION['login_userId']))  echo $_SESSION['login_userId']; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>手机</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='reserveLabMakeTable_perPhone'/>
                                    </td>
                                    <td><label>邮箱</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='reserveLabMakeTable_perMail'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>是否预约设备</label></td>
                                    <td colspan="3">
                                        <select class="form-control" name="reserveLabMakeTable_equip">
                                            <option value="是">是</option>
                                            <option value="否">否</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td colspan="4">预约原因</td></tr>
                                <tr>
                                    <td colspan="4">
                                        <textarea class="form-control" rows="10" name="reserveLabMakeTable_reason"></textarea>
                                    </td>
                                </tr>

                            </table>
                            <input type='reset' class='btn btn-default' value='重置' >
                            <input type='submit' class='btn btn-info' value='确认提交' >
                        </form>
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

</body>
</html>
