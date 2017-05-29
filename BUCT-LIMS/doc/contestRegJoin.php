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
require_once "../model/Comp_tb_serv.class.php";
require_once "../model/Compjoin_tb_serv.class.php";

if (isset($_SESSION['contestRegJoin_err'])){
    if ($_SESSION['contestRegJoin_err']==1){
        echo "<script type='text/javascript'>alert('报名成功，等待审核中！');</script>";
    }elseif ($_SESSION['contestRegJoin_err']==2){
        echo "<script type='text/javascript'>alert('报名失败，请重试！');</script>";
    }
    unset($_SESSION['contestRegJoin_err']);
}

if (empty($_GET['comp_id'])||empty($_SESSION['login_userId'])||empty($_SESSION['login_userName'])){
    echo "<script type='text/javascript'>alert('未登录，先登录去！');parent.location.href='../doc/loginOrSign.php';</script>";
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">竞赛信息</h4>

            </div>

        </div>
        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="contestReg.php" class="menu-top-active">报名中</a></li>
                            <li><a href="contestProc.php">进行中</a></li>
                            <li><a href="contentEnd.php">已结束</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">

                <div class="panel panel-info">
                    <div class="panel-heading">竞赛报名</div>

                    <?php
                    $compjoin_tb_serv=new Compjoin_tb_serv();

//                    echo $_GET['comp_id']."<br>".$_SESSION['login_userId']."<br>";
                    $resCheck=$compjoin_tb_serv->getCompjoinTbByCompIdAndLeaderId($_GET['comp_id'],$_SESSION['login_userId'])[0]['compjoin_id'];

                    if ($resCheck==""){
                        echo "
                    <div class='panel-body'>
                        <form role='form' method='post' action='../control/contestRegJoinProcess.php' onsubmit='return isEmpty_contestRegJoinForm();'>
                            <table class='table table-bordered table-responsive'>
                                <tr>
                                    <td><label>竞赛编号</label></td>
                                    <td colspan='3'>
                                        <input class='form-control' type='text' readonly name='contestRegJoin_compId' value=".$_GET['comp_id'].">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>团队名称</label></td>
                                    <td colspan='3'><input class='form-control' type='text' name='contestRegJoin_groupName'/></td>
                                </tr>
                                <tr><td colspan='4'>队长基本信息<span style='color: red;'>(必填项)</span></td></tr>
                                <tr>
                                    <td><label>队长姓名</label></td>
                                    <td>
                                        <input class='form-control' type='text' readonly name='contestRegJoin_leaderName' value=".$_SESSION['login_userName'].">
                                    </td>
                                    <td><label>队长学号</label></td>
                                    <td>
                                        <input class='form-control' type='text' readonly name='contestRegJoin_leaderId' value=".$_SESSION['login_userId'].">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>队长手机</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_leaderPhone'/>
                                    </td>
                                    <td><label>队长邮箱</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_leaderMail'/>
                                    </td>
                                </tr>
                                <tr><td colspan='4'>队员基本信息</td></tr>
                                <tr>
                                    <td><label>队员1姓名</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberName_1'/>
                                    </td>
                                    <td><label>队员1学号</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberId_1'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>队员2姓名</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberName_2'/>
                                    </td>
                                    <td><label>队员2学号</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberId_2'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>队员3姓名</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberName_3'/>
                                    </td>
                                    <td><label>队员3学号</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberId_3'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>队员4姓名</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberName_4'/>
                                    </td>
                                    <td><label>队员4学号</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_memberId_4'/>
                                    </td>
                                </tr>
                                <tr><td colspan='4'>指导老师信息<span style='color: red;'>(请与指导老师联系后再填写)</span></td></tr>
                                <tr>
                                    <td><label>老师姓名</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_teaName'/>
                                    </td>
                                    <td><label>老师工号</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_teaId'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>老师手机</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_teaPhone'/>
                                    </td>
                                    <td><label>老师邮箱</label></td>
                                    <td>
                                        <input class='form-control' type='text' name='contestRegJoin_teaMail'/>
                                    </td>
                                </tr>
                            </table>
                            <input type='reset' class='btn btn-default' value='重置' >
                            <input type='submit' class='btn btn-info' value='确认提交' >
                        </form>
                    </div>";
                    }
                    else{
                        $resInfo=$compjoin_tb_serv->getCompjoinTbInfoByCompjoinId($resCheck);
                        echo "
                    <div class='panel-body'>
                        <form role='form'>
                            <table class='table table-bordered table-responsive'>
                                <tr>
                                    <td><label>竞赛编号</label></td>
                                    <td colspan='3'>".$_GET['comp_id']."</td>
                                </tr>
                            <tr>
                                <td><label>参赛编号</label></td>
                                <td colspan='3'>".$resInfo->getCompjoinId()."</td>
                            </tr>
                            <tr>
                                <td><label>审核状态</label></td>
                                <td colspan='3'>".$resInfo->getCompjoinStatus()."</td>
                            </tr>
                            <tr>
                                <td><label>团队名称</label></td>
                                <td colspan='3'>".$resInfo->getCompjoinName()."</td>
                            </tr>
                            <tr><td colspan='4'>队长基本信息<span style='color: red;'>*</span></td></tr>
                            <tr>
                                <td><label>队长姓名</label></td><td>".$resInfo->getCompjoinLeaderName()."</td>
                                <td><label>队长学号</label></td><td>".$resInfo->getCompjoinLeaderId()."</td>
                            </tr>
                            <tr>
                                <td><label>队长手机</label></td><td>".$resInfo->getCompjoinLeaderPhone()."</td>
                                <td><label>队长邮箱</label></td><td>".$resInfo->getCompjoinLeaderMail()."</td>
                            </tr>
                            <tr><td colspan='4'>队员基本信息</td></tr>
                            <tr>
                                <td><label>队员1姓名</label></td><td>".$resInfo->getCompjoinMemberName1()."</td>
                                <td><label>队员1学号</label></td><td>".$resInfo->getCompjoinMemberId1()."</td>
                            </tr>
                            <tr>
                                <td><label>队员2姓名</label></td><td>".$resInfo->getCompjoinMemberName2()."</td>
                                <td><label>队员2学号</label></td><td>".$resInfo->getCompjoinMemberId2()."</td>
                            </tr>
                            <tr>
                                <td><label>队员3姓名</label></td><td>".$resInfo->getCompjoinMemberName3()."</td>
                                <td><label>队员3学号</label></td><td>".$resInfo->getCompjoinMemberId3()."</td>
                            </tr>
                            <tr>
                                <td><label>队员4姓名</label></td><td>".$resInfo->getCompjoinMemberName4()."</td>
                                <td><label>队员4学号</label></td><td>".$resInfo->getCompjoinMemberId4()."</td>
                            </tr>
                            <tr><td colspan='4'>指导老师信息</td></tr>
                            <tr>
                                <td><label>老师姓名</label></td><td>".$resInfo->getCompjoinTeaName()."</td>
                                <td><label>老师工号</label></td><td>".$resInfo->getCompjoinTeaId()."</td>
                            </tr>
                            <tr>
                                <td><label>老师手机</label></td><td>".$resInfo->getCompjoinTeaPhone()."</td>
                                <td><label>老师邮箱</label></td><td>".$resInfo->getCompjoinTeaMail()."</td>
                            </tr>
                            <tr>
                                <td><label>所获荣誉</label></td><td colspan='3'>".$resInfo->getCompjoinGlory()."</td>
                            </tr>
                        </table>
                    </form>
                </div>";
                    }

                    ?>

<!--                    <div class="panel-body">-->
<!--                        <form role="form" method="post" action="../control/contestRegJoinProcess.php" onsubmit="return isEmpty_contestRegJoinForm();">-->
<!--                            <table class="table table-bordered table-responsive">-->
<!--                                <tr>-->
<!--                                    <td><label>竞赛编号</label></td>-->
<!--                                    <td colspan="3">-->
<!--                                        <input class="form-control" type="text" readonly name="contestRegJoin_compId" value="--><?php //if (!empty($_GET['comp_id'])) echo $_GET['comp_id'] ?><!--"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td><label>团队名称</label></td>-->
<!--                                    <td colspan="3"><input class="form-control" type="text" name="contestRegJoin_groupName"/></td>-->
<!--                                </tr>-->
<!--                                <tr><td colspan="4">队长基本信息<span style="color: red;">(必填项)</span></td></tr>-->
<!--                                <tr>-->
<!--                                    <td><label>队长姓名</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" readonly name="contestRegJoin_leaderName" value="--><?php //if (isset($_SESSION['login_userId'])) echo $_SESSION['login_userName'] ?><!--"/>-->
<!--                                    </td>-->
<!--                                    <td><label>队长学号</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" readonly name="contestRegJoin_leaderId" value="--><?php //if (isset($_SESSION['login_userId'])) echo $_SESSION['login_userId'] ?><!--"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td><label>队长手机</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_leaderPhone"/>-->
<!--                                    </td>-->
<!--                                    <td><label>队长邮箱</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_leaderMail"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr><td colspan="4">队员基本信息</td></tr>-->
<!--                                <tr>-->
<!--                                    <td><label>队员1姓名</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberName_1"/>-->
<!--                                    </td>-->
<!--                                    <td><label>队员1学号</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberId_1"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td><label>队员2姓名</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberName_2"/>-->
<!--                                    </td>-->
<!--                                    <td><label>队员2学号</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberId_2"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td><label>队员3姓名</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberName_3"/>-->
<!--                                    </td>-->
<!--                                    <td><label>队员3学号</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberId_3"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td><label>队员4姓名</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberName_4"/>-->
<!--                                    </td>-->
<!--                                    <td><label>队员4学号</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_memberId_4"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr><td colspan="4">指导老师信息<span style="color: red;">(请与指导老师联系后再填写)</span></td></tr>-->
<!--                                <tr>-->
<!--                                    <td><label>老师姓名</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_teaName"/>-->
<!--                                    </td>-->
<!--                                    <td><label>老师工号</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_teaId"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td><label>老师手机</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_teaPhone"/>-->
<!--                                    </td>-->
<!--                                    <td><label>老师邮箱</label></td>-->
<!--                                    <td>-->
<!--                                        <input class="form-control" type="text" name="contestRegJoin_teaMail"/>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            </table>-->
<!--                            <input type="reset" class="btn btn-default" value="重置" />-->
<!--                            <input type="submit" class="btn btn-info" value="确认提交" />-->
<!--                        </form>-->
<!--                    </div>-->



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

</body>
</html>
