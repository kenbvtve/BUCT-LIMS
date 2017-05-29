<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/5
 * Time: 20:59
 */

//工具类，对数据库的操作
class SqlHelp{
    public $con;
    public $dbName="dblims";
    public $username="root";
    public $password="root";
    public $host="";

    function __construct()
    {
        $this->con=new mysqli($this->host,$this->username,$this->password,$this->dbName) or die("数据库连接失败：".$this->con->connect_errno);
    }

    //关闭连接方法
    function close_connect(){
        if (!empty($this->con)){
            $this->con->close();
        }
    }

    //执行dql语句，select
    function execute_dql($sql){
        $res=$this->con->query($sql) or die($this->con->errno);
        return $res;
    }

    //快速关闭资源的dql语句,并导入二维数组
    function execute_dql_quick($sql){
        $arr=array();
        $res=$this->con->query($sql) or die($this->con->error);
        $i=0;
        while ($row=$res->fetch_assoc()){
            $arr[$i++]=$row;
        }
        $res->free_result();
        return $arr;
    }

    //执行dml语句,增删改
    function execute_dml($sql){
        $res=$this->con->query($sql) or die($this->con->errno);
        if(!$res){
            return 0;//表示执行失败
        }
        else{
            if ($this->con->affected_rows>0){
                return 1;//表示执行成功
            }
            else{
                return 2;//没有行受到影响
            }
        }
    }


    //考虑分页情况查询
    //$sql1="select * from table_name where limit 0,6;
    //$sql2="select count(id) from table_name";
//    function execute_fenye($sql1,$sql2,&$fenyepage){
//        //查询分页数据
//        $res1=$this->con->query($sql1) or die($this->con->connect_error);
//        $arr=array();
//        //$i=0;
//        while ($row=$res1->fetch_assoc()){
//            $arr[]=$row;
//        }
//
//        $res2=$this->con->query($sql2) or die($this->con->error);
//        if ($row=$res2->fetch_row()){
//            $fenyepage->pageCount=ceil($row[0]/$fenyepage->pageSize);
//            $fenyepage->rowCount=$row[0];
//        }
//
//        $navigate="";
//        $startPage=floor(($fenyepage->pageNow-1)/$fenyepage->pageWhole)*$fenyepage->pageWhole+1;
//        $index=$startPage;
//
//        if ($startPage>$fenyepage->pageWhole){
//            $navigate = "<a href='userControl2.php?pageNow=$startPage'.'-1'><<</a>";
//        }
//
//        for (;$startPage<$index+$fenyepage->pageWhole;$startPage++){
//            if ($startPage>=1&&$startPage<=$fenyepage->pageCount){
//                $navigate .= "<a href='userControl2.php?pageNow=$startPage'>[$startPage]</a> ";
//            }
//        }
//
//        if ($startPage<=$fenyepage->pageCount) {
//            $navigate .= "<a href='userControl2.php?pageNow=$startPage'>>></a>";
//        }
//
//        if($fenyepage->pageNow>1) {
//            $prePage = $fenyepage->pageNow-1;
//            $navigate .= "<a href='userControl2.php?pageNow=$prePage'>上一页</a> ";
//        }
//        if ($fenyepage->pageNow<$fenyepage->pageCount){
//            $nextPage = $fenyepage->pageNow+1;
//            $navigate .= "<a href='userControl2.php?pageNow=$nextPage'>下一页</a>";
//        }
//        $fenyepage->res_array=$arr;
//        $fenyepage->navigate=$navigate;
//
//        $res2->free_result();
//
//    }
//
//
//
//
//


}
