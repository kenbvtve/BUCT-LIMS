<div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="../bootstrap/img/logo.png" alt="">
            </a>
        </div>
    </div>
</div>

<?php
error_reporting(0);session_start(300);
if (empty($_SESSION['login_userId'])) {

//未登录
    echo "
<section class='menu-section'>
    <div class='container'>
        <div class='row '>
            <div class='col-md-12'>
                <div class='navbar-collapse collapse '>
                    <ul id='menu-top' class='nav navbar-nav navbar-right'>
                        <li><a href='../doc/index.php' class=''>首页</a>
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>查询<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/inquireLab.php'>实验室查询</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/inquireEquip.php'>设备查询</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../control/exHand_isLoginingProcess.php?type=timetable'>课表查询</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>预约<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../control/exHand_isLoginingProcess.php?type=reserve'>实验室预约</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../control/exHand_isLoginingProcess.php?type=reserve'>设备预约</a></li>
                            </ul>
                        </li>
                        <li><a href='contestReg.php'>竞赛信息</a></li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>关于我们<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/aboutFeedback.php'>联系我们</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/aboutNotice.php'>公告通知</a></li>
                            </ul>
                        </li>

                        <li><a href='../doc/loginOrSign.php'>登录/注册</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>";

}


//登录用户为学生
else {
    if ($_SESSION['login_userType'] == 3) {
        echo "
<section class='menu-section'>
    <div class='container'>
        <div class='row '>
            <div class='col-md-12'>
                <div class='navbar-collapse collapse '>
                    <ul id='menu-top' class='nav navbar-nav navbar-right'>
                        <li><a href='../doc/index.php' class=''>首页</a>
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>查询<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/inquireLab.php'>实验室查询</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/inquireEquip.php'>设备查询</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docStu/inquireScheduleLabAndDate.php'>课表查询</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>预约<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/reserveLab.php'>实验室预约</a></li>
                               <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/reserveEquip.php'>设备预约</a></li>
                            </ul>
                        </li>
                        <li><a href='../doc/contestReg.php'>竞赛信息</a></li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>关于我们<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/aboutFeedback.php'>联系我们</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/aboutNotice.php'>公告通知</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>欢迎：" . $_SESSION['login_userName'] . "<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docStu/loginingPersonInfo.php'>个人中心</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/loginingChangePersonInfo.php'>修改个人信息</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/loginingChangePersonPw.php'>修改密码</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../control/exitProcess.php?exit_user_id={$_SESSION['login_userId']}'>退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>";
    }

    //登录用户为老师
    elseif ($_SESSION['login_userType']==2){
        echo "
<section class='menu-section'>
    <div class='container'>
        <div class='row '>
            <div class='col-md-12'>
                <div class='navbar-collapse collapse '>
                    <ul id='menu-top' class='nav navbar-nav navbar-right'>
                        <li><a href='../doc/index.php' class=''>首页</a>
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>查询<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/inquireLab.php'>实验室查询</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/inquireEquip.php'>设备查询</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docStu/inquireScheduleLabAndDate.php'>课表查询</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>预约<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/reserveLab.php'>实验室预约</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/reserveEquip.php'>实验室预约</a></li>
                            </ul>
                        </li>
                        <li><a href='../doc/contestReg.php'>竞赛信息</a></li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>关于我们<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/aboutFeedback.php'>联系我们</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/aboutNotice.php'>公告通知</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>欢迎：" . $_SESSION['login_userName'] . "<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docTea/loginingPersonInfo.php'>个人中心</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/loginingChangePersonInfo.php'>修改个人信息</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/loginingChangePersonPw.php'>修改密码</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../control/exitProcess.php?exit_user_id={$_SESSION['login_userId']}'>退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>";
    }

    //登录用户为管理员
    elseif ($_SESSION['login_userType']==1){
        echo "
<section class='menu-section'>
    <div class='container'>
        <div class='row '>
            <div class='col-md-12'>
                <div class='navbar-collapse collapse '>
                    <ul id='menu-top' class='nav navbar-nav navbar-right'>
                        <li><a href='../doc/index.php' class=''>首页</a>
                        
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>用户管理<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/userManageAdd.php'>添加用户</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/userManageExam.php'>用户审核</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/userManageUserAll.php'>用户列表</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>实验室管理<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>            
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/labManageExam.php'>实验室申请管理</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/labManageLabAll.php'>实验室列表</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/labManageAdd.php'>新增实验室</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/labManageExamHistory.php'>实验室历史预约</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>设备管理<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/equipManageExam.php'>设备申请审核</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/equipManageAdd.php'>新增设备</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/equipManageEquipAll.php'>设备列表</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/equipManageExamHistory.php'>设备历史预约</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>竞赛管理<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/compManageAdd.php'>添加竞赛</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/compManageCompExam.php'>竞赛申请审核</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/compManageCompRegister.php'>竞赛列表</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>关于我们<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/aboutUsFeedbackList.php'>反馈信息列表</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/aboutUsNoticeAdd.php'>发布公告</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../docRoot/aboutUsNoticeList.php'>公告列表</a></li>
                            </ul>
                        </li>
                        
                        

                        <li>
                            <a href='#' class='dropdown-toggle' id='ddlmenuItem' data-toggle='dropdown'>欢迎：" . $_SESSION['login_userName'] . "<i class='fa fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='ddlmenuItem'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/loginingChangePersonInfo.php'>修改个人资料</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../doc/loginingChangePersonPw.php'>修改密码</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='../control/exitProcess.php?exit_user_id={$_SESSION['login_userId']}'>退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>";
    }
}
?>