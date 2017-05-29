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
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form"  enctype="multipart/form-data" method="post" action="../control/labManageAddLabProcess.php" onsubmit="return isEmpty_labManageAddLabForm();">
                            <div class="form-group">
                                <label>实验室id</label>
                                <input class="form-control" type="text" name="labManageAddLab_labId" maxlength="6"/>
                            </div>

                            <div class="form-group">
                                <label>实验室名称</label>
                                <input class="form-control" type="text" name="labManageAddLab_labName"/>
                            </div>

                            <div class="form-group">
                                <label>实验室等级</label>
                                <select class="form-control" name="labManageAddLab_labGrade">
                                    <option value="普通">普通</option>
                                    <option value="二级">二级</option>
                                    <option value="一级">一级</option>
                                    <option value="国家级">国家级</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>所属学院</label>
                                <select class="form-control" name="labManageAddLab_labCollege">
                                    <option value="材料学院">材料学院</option>
                                    <option value="化工学院">化工学院</option>
                                    <option value="信息学院">信息学院</option>
                                    <option value="机械学院">机械学院</option>
                                    <option value="文法学院">文法学院</option>
                                    <option value="经管学院">经管学院</option>
                                    <option value="生命学院">生命学院</option>
                                    <option value="理学院">理学院</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>所属校区</label>
                                <select class="form-control" name="labManageAddLab_labZone">
                                    <option value="东校区">东校区</option>
                                    <option value="北校区">北校区</option>
                                    <option value="昌平校区">昌平校区</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>实验室状态</label>
                                <select class="form-control" name="labManageAddLab_status">
                                    <option value="正常">正常</option>
                                    <option value="停用">停用</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>实验室简介</label>
                                <textarea class="form-control" rows="5" name="labManageAddLab_labDesc"></textarea>
                            </div>

                            <div class="form-group">
                                <label>上传图片<span style="color: red;">(不得大于5MB)</span></label>
                                <input type="file" name="labManageAddLab_img">
                            </div>

                            <input type="reset" class="btn btn-default" value="重置" />
                            <input type="submit" class="btn btn-info" value="确认提交" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="alert alert-danger" >
                    <strong>实验室id输入规则：</strong>
                    <p>1    实验室id由两位大写字母和3位或4位数字组成。</p>
                    <p>2    以实验室id AD101 为例，A代表东校区,D代表电教,101为门牌号。</p><br>
                    <p>另：<br>北校区以B表示，昌平校区以C表示。<br>实验室id和实验室名称为必填内容。</p>
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

</body>
</html>

