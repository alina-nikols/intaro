<?php
session_start();
if(empty($_SESSION['login']))
{
	echo "������ �� ��� �������� �������� ������ ������������������ �������������. ���� �� ����������������, �� ������� �� ���� ��� ����� ������� � ������� <br><a href='index.php'>��������������</a>";
}
else
{
echo "<b>�������� ������</b><br>";
$color = "coral red";
echo "�� ����� �� ����, ��� <font color=$color>" .$_SESSION['login']."</font> <a href='exit.php'>�����</a>";
echo "<br><br>";
if (isset($_POST['name']))
{
	$name = $_POST['name'];
	if ($name == '')
	{
		unset($name);
	}
}
$connect = mysql_connect ("localhost","root","");
mysql_select_db("pr",$connect);
mysql_set_charset("cp1251");
$name = $_POST['name'];
$login = $_SESSION['login'];

$result = mysql_query ("SELECT name FROM zayavka WHERE login = '$login' AND name = '$name'");
$myrow = mysql_fetch_array($result);
if (!empty($myrow['name']))
{
	$result = mysql_query("SELECT name, phone, problem FROM zayavka WHERE name = '$name'",$connect);
	while ($vvv = mysql_fetch_array($result))
	echo "�������� ������: ".$vvv['name']."<br>����� ��������: ".$vvv['phone']."<br>�������� ��������: ".$vvv['problem']."<br>";
}
else
{
	echo "������! ������ �� �������.";
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
