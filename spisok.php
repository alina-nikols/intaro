<?php
session_start();
if(empty($_SESSION['login']))
{
	echo "������ �� ��� �������� �������� ������ ������������������ �������������. ���� �� ����������������, �� ������� �� ���� ��� ����� ������� � ������� <br><a href='index.php'>��������������</a>";
}
else
{
echo "<b>������ ������</b><br>";
$color = "coral red";
echo "�� ����� �� ����, ��� <font color=$color>" .$_SESSION['login']."</font> <a href='exit.php'>�����</a>";
echo "<br><br>";
$connect = mysql_connect ("localhost","root","");
mysql_select_db("pr",$connect);
mysql_set_charset("cp1251");
$login = $_SESSION['login'];

$res = mysql_query("SELECT name, phone, problem FROM zayavka WHERE login = '$login' ORDER BY id DESC LIMIT 1",$connect);
$result = mysql_query("SELECT name, phone, problem FROM zayavka WHERE login = '$login' ORDER BY id DESC LIMIT 1,1000000",$connect);

$v = mysql_fetch_assoc($res);
$color = "red";
echo "<font color=$color>".$v['name']."</font><br>-------------------------------------------------------<br>";

while($vv = mysql_fetch_assoc($result))
{
	echo "".$vv['name']."<br>-------------------------------------------------------<br>";
}

if($login == "admin")
{
	$res = mysql_query("SELECT * FROM zayavka ORDER BY id DESC LIMIT 1",$connect);
	$v = mysql_fetch_assoc($res);
	$color = "red";
	echo "<font color=$color> �����: ".$v['login']."<br>������: ".$v['name']."</font><br>-------------------------------------------------------<br>";

	$result = mysql_query("SELECT * FROM zayavka ORDER BY id DESC LIMIT 1,1000000",$connect);
	while($vv = mysql_fetch_assoc($result))
	{
		echo "�����: ".$vv['login']."<br>������: ".$vv['name']."<br>-------------------------------------------------------<br>";
	}
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<b><br>�������� ������ � ������</b>
<form action="prosmotr.php" method="post">
<p>�������� ������: <input type="text" name="name" /></p>
<input type="submit" value="����������� ������" name="log_in" />