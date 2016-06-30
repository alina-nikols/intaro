<?php
session_start();
$connect = mysql_connect ("localhost","root","");
mysql_select_db("pr",$connect);
mysql_set_charset("cp1251");
?>
