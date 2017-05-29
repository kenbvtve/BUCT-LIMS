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
//if (isset($_SESSION['userManageAddUser_err'])){
//    if ($_SESSION['userManageAddUser_err']==1){
//        echo "<script type='text/javascript'>alert('该用户已存在！');</script>";
//    }elseif ($_SESSION['userManageAddUser_err']==2){
//        echo "<script type='text/javascript'>alert('恭喜！注册成功！');</script>";
//    }elseif ($_SESSION['userManageAddUser_err']==3){
//        echo "<script type='text/javascript'>alert('注册失败，发生未知错误！');</script>";
//    }elseif ($_SESSION['userManageAddUser_err']==0) {
//        echo "<script type='text/javascript'>alert('非法用户，无权操作！');</script>";
//    }
//    unset($_SESSION['userManageAddUser_err']);
//}

?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">新增实验室</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form"  enctype="multipart/form-data" method="post" action="../control/equipManageAddEquipProcess.php" onsubmit="return isEmpty_equipManageAddEquipForm();">
                            <div class="form-group">
                                <label>设备编号<span style="color: red;">*</span></label>
                                <input class="form-control" type="text" name="equipManageAddEquip_equipId" maxlength="12"/>
                            </div>

                            <div class="form-group">
                                <label>所属实验室编号<span style="color: red;">*</span></label>
                                <input class="form-control" type="text" name="equipManageAddEquip_labId"/>
                            </div>

                            <div class="form-group">
                                <label>设备名称<span style="color: red;">*</span></label>
                                <input class="form-control" type="text" name="equipManageAddEquip_equipName"/>
                            </div>

                            <div class="form-group">
                                <label>设备型号</label>
                                <input class="form-control" type="text" name="equipManageAddEquip_equipModel"/>
                            </div>

                            <div class="form-group">
                                <label>价格</label></label>
                                <input class="form-control" type="text" name="equipManageAddEquip_equipPrice"/>
                            </div>

                            <div class="form-group">
                                <label>生产厂商</label></label>
                                <input class="form-control" type="text" name="equipManageAddEquip_manu"/>
                            </div>

                            <div class="form-group">
                                <label>出厂编号</label></label>
                                <input class="form-control" type="text" name="equipManageAddEquip_manuNo"/>
                            </div>

                            <div class="form-group">
                                <label>出厂时间<span style="color: red;">*</span></label>
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" value="" readonly name="equipManageAddEquip_manuTime">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>购入时间<span style="color: red;">*</span></label>
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" value="" readonly name="equipManageAddEquip_chaseTime">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>设备状态</label>
                                <select class="form-control" name="equipManageAddEquip_status">
                                    <option value="正常">正常</option>
                                    <option value="停用">停用</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>设备简介</label></label>
                                <textarea class="form-control" rows="5" name="equipManageAddEquip_desc"></textarea>
                            </div>

                            <div class="form-group">
                                <label>上传图片<span style="color: red;">(不得大于5MB)</span></label>
                                <input type="file" name="equipManageAddEquip_img">
                            </div>

                            <input type="reset" class="btn btn-default" value="重置" />
                            <input type="submit" class="btn btn-info" value="确认提交" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="alert alert-danger" >
                    <strong>新增设备规则：</strong>
                    <p>1    设备编号12位组成，包括首位大写字母和11位数字。</p>
                    <p>2    以设备编号 A14201000001 为例，A代表东校区，14 代表学院，2010 代表购入年份，00001 代表当年购入编号。</p>
                    <p>3    实验室编号，必须存在系统中，否则无法新增成功。</p><br>
                    <p>另：<br>北校区以B表示，昌平校区以C表示。<br>带<span style="color: red">*</span>的为必填项。</p>
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
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>

</body>
</html>

