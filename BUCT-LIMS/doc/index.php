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

    <script src="../bootstrap/js/myscript.js" type="text/javascript"></script>
</head>

<body>
<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
require_once "../model/Comp_tb_serv.class.php";
require_once "../model/Notice_tb_serv.class.php";
require_once "../model/Lab_tb_serv.class.php";
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row">
            <!--图片展示区            -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >

                    <div class="carousel-inner" width="1000" height="500">
                        <div class="item active">
                            <img src="../upload/index/3.JPG" alt="" />
                        </div>
                        <div class="item">
                            <img src="../upload/index/2.JPG" alt="" />
                        </div>
                        <div class="item">
                            <img src="../upload/index/3.JPG" alt="" />
                        </div>
                    </div>
                    <!--INDICATORS-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <!--信息简介-->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php
                $lab_tb_serv=new Lab_tb_serv();
                $resLab=$lab_tb_serv->get;
                ?>
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        信息概况
                    </div>
                    <div class="panel-body chat-widget-main">
                        <div class="chat-widget-left">
                            北京化工大学东校区科技楼承载着最多的科研工作。
                        </div>

                        <hr />
                        <div class="chat-widget-right">
                            北京化工大学东校区计算机楼拥有最全的硬件实验设备，以及仿真中心。
                        </div>

                        <hr />
                        <div class="chat-widget-left">
                            北京化工大学东校区电教楼拥有全校最大的机房，最多的电脑设备，也承担着最多的教学任务。
                        </div>

                        <hr />
                        <div class="chat-widget-right">
                            北京化工大学化工楼拥有最全的化工实验设备、最多也最顶尖的化工实验人员。
                        </div>

                        <hr />
                    </div>

                </div>
            </div>

        </div>

        <!--竞赛信息-->
        <div class="row">

            <?php
            $comp_tb_serv=new Comp_tb_serv();
            $resComp=$comp_tb_serv->getCompListForIndex();
            ?>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        最新竞赛
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>竞赛名称</th>
                                    <th>竞赛类型</th>
                                    <th>人数/组</th>
                                </tr>

                                <?php

                                for ($i=0;$i<count($resComp);$i++) {
                                    $row = $resComp[$i];
                                    $j=$i+1;

                                    echo "<tr><td>$j</td><td><a href='../doc/contestRegProEndInfo.php?comp_id={$row['comp_id']}'>{$row['comp_name']}</a></td><td>{$row['comp_type']}</td><td>{$row['comp_numper']}</td></tr>";
                                }

                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 提示           -->
            <?php
            $notice_tb_serv=new Notice_tb_serv();
            $resMostRecentNotice=$notice_tb_serv->getMostRecentNotice();

            ?>
            <div class="col-md-4 col-sm-4 col-xs-12" >
                <div class="alert alert-info text-center">
                    <h3><?php  echo $resMostRecentNotice->getNoticeTitle(); ?></h3>
                    <hr />
                    <i class="fa fa-warning fa-4x"></i>
                    <p><?php echo mb_substr($resMostRecentNotice->getNoticeContent(),0,100,'utf-8')."..."; ?></p>
                    <hr />
                    <!--                    <button href="aboutNoticeDeta.php?notice_id='$resMostRecentNotice->get'" class="btn btn-info">查看详细信息</button>-->
                    <?php
                    echo "<a href='aboutNoticeDeta.php?notice_id={$resMostRecentNotice->getNoticeId()}' class='btn btn-info'>查看详细信息</a>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once  "../frame/footer.php"; ?>

<!-- CORE JQUERY  -->
<script src="../bootstrap/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="../bootstrap/js/custom.js"></script>

</body>
</html>
