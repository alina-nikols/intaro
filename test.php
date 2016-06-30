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
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
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
		echo "Извините, введённый вами login или пароль неверный.";
    }
    else
	{
		if ($myrow['password']==$password)
		{
			$_SESSION['login']=$myrow['login'];
			$_SESSION['id']=$myrow['id'];
			$_SESSION['private']=$myrow['private'];
			$_SESSION['logged'] = 1;
			echo "Вы успешно вошли на сайт ";
			if ($login == "admin") echo "как админ:) ";
			echo "<a href='home.php'>Главная страница</a>";
		}
		else
		{
			echo "Извините, введённый вами login или пароль неверный.";
		}
    }
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />