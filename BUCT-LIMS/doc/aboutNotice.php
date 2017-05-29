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
require_once "../model/Notice_tb_serv.class.php";
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">公告通知</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" style="table-layout:auto;word-break: break-all;">
                                <thead>
                                    <tr><th>#</th><th>公告标题</th><th>公告摘要</th><th>发布时间</th><th>操作</th></tr>
                                </thead>
                                <tbody>

<?php  $pageSize=20;$pageCount=0;$pageNow=1;$pageWhole=10;

//页数
$notice_tb_serv=new Notice_tb_serv();
$pageCount=$notice_tb_serv->getPageCount($pageSize);

if ((!empty($_GET['pageNow']))&&$_GET['pageNow']>=1&&$_GET['pageNow']<=$pageCount){
    $pageNow=$_GET['pageNow'];
}
$res=$notice_tb_serv->getPageList($pageNow,$pageSize);

for ($i=0;$i<count($res);$i++) {
    $row = $res[$i];
    echo "<tr><td>{$row['notice_id']}</td><td>{$row['notice_title']}</td><td>".mb_substr($row['notice_content'],0,15,'utf-8')."</td><td>{$row['notice_time']}</td><td><a href='aboutNoticeDeta.php?notice_id={$row['notice_id']}'>详情</a></td></tr>";
}

?>
                                </tbody>
                            </table>
                        </div>

                        <?php

                        $startPage=floor(($pageNow-1)/$pageWhole)*$pageWhole+1;
                        $index=$startPage;

                        if ($startPage>$pageWhole){
                            echo "<a href='aboutNotice.php?pageNow=$startPage'.'-1'><<</a>";
                        }

                        for (;$startPage<$index+$pageWhole;$startPage++){
                            if ($startPage>=1&&$startPage<=$pageCount){
                                echo "<a href='aboutNotice.php?pageNow=$startPage'>[$startPage]</a> ";
                            }
                        }

                        if ($startPage<=$pageCount) {
                            echo "<a href='aboutNotice.php?pageNow=$startPage'>>></a>";
                        }

                        $prePage=$pageNow-1;
                        $nextPage=$pageNow+1;
                        if($pageNow>1) {
                            echo "<a href='aboutNotice.php?pageNow=$prePage'>上一页</a>";
                        }
                        if ($pageNow<$pageCount){
                            echo "<a href='aboutNotice.php?pageNow=$nextPage'>下一页</a>";
                        }

                        ?>
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

</body>
</html>
