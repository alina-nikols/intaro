<?php
include ("connect.php");
if (isset($_POST['login']))
{
	$login = $_POST['login'];
	if ($login == '')
	{
		unset($login);
	}
}
    if (isset($_POST['name']))
	{
		$name = $_POST['name'];
		if ($name == '')
		{
			unset($name);
		}
	}
    if (isset($_POST['phone']))
	{
		$phone = $_POST['phone'];
		if ($phone =='')
		{
			unset($phone);
		}
	}
    if (isset($_POST['problem']))
	{
		$problem = $_POST['problem'];
		if ($problem =='')
		{
			unset($problem);
		}
	}
	$login = $_SESSION['login'];
    if (empty($name) or empty($phone) or empty($problem))
    {
    echo "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
    }
	else
	{
    $login = stripslashes($login);
    $name = stripslashes($name);
    $phone = stripslashes($phone);
    $problem = stripslashes($problem);
    $problem = htmlspecialchars($problem);
    $login = trim($login);
    $name = trim($name);
    $phone = trim($phone);
    $problem = trim($problem);
	
    $result3 = mysql_query ("INSERT INTO zayavka (login,name,phone,problem) VALUES ('$login','$name','$phone','$problem')");
    if ($result3=='TRUE')
    {
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=spisok.php">';;
    }
 else 
    {
    echo "Ошибка! Заявка не добавлена.";
    }
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
