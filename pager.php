//??????html??,
<?php
$sql = 'select count(*) count from your_table';
$result = mysql_query($sql)  or die(mysql_errno().": ".mysql_error()."\n");
$rs=mysql_fetch_object($result);
$recountCount = $rs->count;
$show =  20;
$totalPage = ceil($recountCount/$show);
$page = (isset($_GET['page'])  && $_GET['page']>=0)? $_GET['page']: 0;
$isLast = ($page==($totalPage -1))? true: false;
$hasNoPre = ($page==0)? true: false;
$hasNoNext =  ($page==$totalPage-1)? true: false;
$isFirst = ($page==0)? true:false;
$start = $page*$show;
mysql_free_result($result);
?>
//?????? html??,
<?
$sql = "select * from your_table limit  $start,$show";
$result = mysql_query($sql) or die(mysql_errno().":  ".mysql_error()."\n");
while($rs=mysql_fetch_object($result)){
//? ?????html????????????
echo $rs->art_id;
echo  "<br>";
}
mysql_free_result($result);
?>

<?
   $str = "? $recountCount ???,??? ".($page+1)."/$totalPage ? ";
   $str .= $isFirst?  "?? "  : "<a href=\"?page=0\">??</a> ";
   $str .= $hasNoPre? "??? " : "<a href=\"?page=".($page-1)."\">???</a> ";
   $str .= $hasNoNext? "??? " : "<a href=\"?page=".($page+1)."\">???</a> ";
   $str .= $isLast?  "?? "  : "<a href=\"?page=".($totalPage-1)."\">??</a>";
   echo $str;
   ?>