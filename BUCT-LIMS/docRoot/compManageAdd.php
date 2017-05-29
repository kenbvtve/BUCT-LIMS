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
    <script type="text/javascript" src="../bootstrap/jeDate.js"></script>

    <link rel="stylesheet" href="../bootstrap/bootstrap-datetimepicker.min.css">

</head>

<body>
<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
if (isset($_SESSION['compManageAdd_err'])){
    switch ($_SESSION['compManageAdd_err']){
        case 0:
            echo "<script type='text/javascript'>alert('非法用户，无操作权限！');</script>";
            break;
        case 3:
            echo "<script type='text/javascript'>alert('该类型已存在！');</script>";
            break;
        case 1:
        case 4:
            echo "<script type='text/javascript'>alert('操作成功！');</script>";
            break;
        case 2:
        case 5:
            echo "<script type='text/javascript'>alert('发生未知错误，请重试！');</script>";
            break;
    }
    unset($_SESSION['compManageAdd_err']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">添加竞赛</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form"  enctype="multipart/form-data" method="post"  action="../control/compManageAddProcess.php?flag=1" onsubmit="return isEmpty_compManageAddCompForm();">
                            <div class="form-group">
                                <label>竞赛名称</label>
                                <input class="form-control" type="text" name="compManageAddComp_name"/>
                            </div>

                            <div class="form-group">
                                <label>竞赛类型</label>
                                <select id="" class="form-control" name="compManageAddComp_type" >
                                    <?php
                                    require_once "../model/Comptype_tb_serv.class.php";
                                    $comptype_tb_serv=new Comptype_tb_serv();
                                    $res=$comptype_tb_serv->getComptypeFromComptypeTb();

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        echo "<option value='{$row['comptype_name']}'>{$row['comptype_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>主办方</label>
                                <input class="form-control" type="text" name="compManageAddComp_sponsor"/>
                            </div>

                            <div class="form-group">
                                <label>最多人数/每组</label>
                                <select id="" class="form-control" name="compManageAddComp_numper">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>报名截止时间</label>
                                <div class="input-group date form_datetime" data-date="yyyy-mm-dd hh:mm:00" data-date-format="yyyy-mm-dd hh:mm:00" data-link-field="dtp_input1">
                                    <input class="form-control" size="16" type="text" value="" readonly name="compManageAddComp_depart">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>竞赛结束时间</label>
                                <div class="input-group date form_datetime" data-date="yyyy-mm-dd hh:mm:00" data-date-format="yyyy-mm-dd hh:mm:00" data-link-field="dtp_input1">
                                    <input class="form-control" size="16" type="text" value="" readonly name="compManageAddComp_end">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>竞赛说明</label>
                                <textarea class="form-control" name="compManageAddComp_info" ></textarea>
                            </div>

                            <div class="form-group">
                                <label>竞赛附件</label>
                                <input type="file" name="compManageAddComp_file"/>
                            </div>

                            <input type="reset" class="btn btn-default" value="重置" />
                            <input type="submit" class="btn btn-info" value="确认提交" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <div class="alert alert-danger" >
                    <strong>ATTENTION：</strong>
                    <p>竞赛类型添加。</p>
                    <p>请谨慎使用。</p>
                </div>

                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="post" action="../control/compManageAddProcess.php?flag=2" id="" onsubmit="return isEmpty_compManageAddCompTypeForm();">
                            <div class="form-group">
                                <label>竞赛类型</label>
                                <input class="form-control" type="text" name="compManageAddCompType_compName"/>
                            </div>
                            <input type="submit" class="btn btn-info" value="提交" />
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

<script src="../bootstrap/bootstrap-datetimepicker.js"></script>
<script src="../bootstrap/bootstrap-datetimepicker.fr.js"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        format:'yyyy-mm-dd hh:00:00'
    });
</script>

</body>
</html>
