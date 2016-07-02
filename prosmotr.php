<?php
include ("connect.php");
if(empty($_SESSION['login']))
{
	echo "Доступ на эту страницу разрешен только зарегистрированным пользователям. Если вы зарегистрированы, то войдите на сайт под своим логином и паролем <br><a href='index.php'>Авторизоваться</a>";
}
else
{
echo "<b>ПРОСМОТР ЗАЯВКИ</b><br>";
$color = "coral red";
echo "Вы вошли на сайт, как <font color=$color>" .$_SESSION['login']."</font> <a href='exit.php'>Выйти</a>";
echo "<br><br>";
if (isset($_POST['name']))
{
	$name = $_POST['name'];
	if ($name == '')
	{
		unset($name);
	}
}
$name = $_POST['name'];
$login = $_SESSION['login'];

$result = mysql_query ("SELECT name FROM zayavka WHERE login = '$login' AND name = '$name'");
$myrow = mysql_fetch_array($result);
if (!empty($myrow['name']))
{
	$result = mysql_query("SELECT name, phone, problem FROM zayavka WHERE name = '$name'",$connect);
	while ($vvv = mysql_fetch_array($result))
	echo "Название заявки: ".$vvv['name']."<br>Номер телефона: ".$vvv['phone']."<br>Описание проблемы: ".$vvv['problem']."<br>";
}
else
{
	echo "Ошибка! Заявка не найдена.";
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
