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
	echo "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
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
		echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
    }
    $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");
	if ($result2=='TRUE')
	{
		echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Авторизироваться</a>";
    }
	else 
    {
		echo "Ошибка! Вы не зарегистрированы.";
    }
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />