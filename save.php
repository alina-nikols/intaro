<?php
if (isset($_POST['login'])) 
{ 
$login = $_POST['login'];
if ($login == '')
    {
		unset($login);
	} 
}
if (isset($_POST['password']))
{
	$password=$_POST['password'];
	if ($password =='')
	{
		unset($password);
	} 
}
if (empty($login) or empty($password))
{
	echo "�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!";
	}
	$login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $connect = mysql_connect ("localhost","root","");
	mysql_select_db("pr",$connect);
	mysql_set_charset("cp1251");
    $result = mysql_query("SELECT login FROM users WHERE login='$login'",$connect);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['login']))
	{
		echo "��������, �������� ���� ����� ��� ���������������. ������� ������ �����.";
    }
    $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");
	if ($result2=='TRUE')
	{
		echo "�� ������� ����������������! ������ �� ������ ����� �� ����. <a href='index.php'>����������������</a>";
    }
	else 
    {
		echo "������! �� �� ����������������.";
    }
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />