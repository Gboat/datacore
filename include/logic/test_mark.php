<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
$Mark = $_POST["mark"]; 
$Theme = $_POST["theme"];
if(!$Mark||!$Theme)
{
    echo 'You have not entered search details.Please go back and try again.';
    exit;
}
$mycon = mysql_connect("localhost","test","test");
mysql_query("set names 'UTF8'");
mysql_select_db("test",$mycon);
$strSql = "INSERT INTO weibo(mark,theme)VALUES ('$Mark','$Theme')";
mysql_query($strSql);
echo 'success';
/*
while($row = mysql_fetch_array($result))
{
 ?>
<tr>
<td align="center" height="19" ><?echo $row["mark"]?></td>
<td align="center"><?echo $row["theme"]?></td>
</tr>
<?
}*/
mysql_close($mycon);
/*$feed_mark = array();
array_push($feed_mark,$Mark);
for($i=0;$i<count($feed_mark);$i++)
{
    echo $feed_mark[$i].'<br/>';
}*/

/*echo "sdfgdhg";
for($i = 0;$i<count($feed_mark);$i++)
{
//    echo $mark_array[$i];
 if( eregi($feed_mark[$i],$feed_content))
 {
  $feed_content = '#'.$feed_theme[$i].'#'.$feed_content;
 }
}
echo $feed_content;*/
?>
</body>
</html>
