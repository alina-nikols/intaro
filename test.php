<?php session_start();
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
    exit ("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
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
	$result = mysql_query("SELECT * FROM users WHERE login='$login'",$connect);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['password']))
    {
		echo "��������, �������� ���� login ��� ������ ��������.";
    }
    else
	{
		if ($myrow['password']==$password)
		{
			$_SESSION['login']=$myrow['login'];
			$_SESSION['id']=$myrow['id'];
			$_SESSION['private']=$myrow['private'];
			$_SESSION['logged'] = 1;
			echo "�� ������� ����� �� ���� ";
			if ($login == "admin") echo "��� �����:) ";
			echo "<a href='home.php'>������� ��������</a>";
		}
		else
		{
			echo "��������, �������� ���� login ��� ������ ��������.";
		}
    }
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />