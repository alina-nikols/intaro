<?php
include ("connect.php");
if(empty($_SESSION['login']))
{
	echo "Доступ на эту страницу разрешен только зарегистрированным пользователям. Если вы зарегистрированы, то войдите на сайт под своим логином и паролем <br><a href='index.php'>Авторизоваться</a>";
}
else
{
echo "<b>СПИСОК ЗАЯВОК</b><br>";
$color = "coral red";
echo "Вы вошли на сайт, как <font color=$color>" .$_SESSION['login']."</font> <a href='exit.php'>Выйти</a>";
echo "<br><br>";
$login = $_SESSION['login'];

$result = mysql_query("SELECT name, phone, problem FROM zayavka WHERE login = '$login' ORDER BY id DESC",$connect);

while($vv = mysql_fetch_assoc($result))
{
	echo "".$vv['name']."<br>-------------------------------------------------------<br>";
}

if($login == "admin")
{
	$result = mysql_query("SELECT * FROM zayavka ORDER BY id DESC",$connect);
	while($vv = mysql_fetch_assoc($result))
	{
		echo "Логин: ".$vv['login']."<br>Заявка: ".$vv['name']."<br>-------------------------------------------------------<br>";
	}
}
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<b><br>Просмотр данных о заявке</b>
<form action="prosmotr.php" method="post">
<p>Название заявки: <input type="text" name="name" /></p>
<input type="submit" value="Просмотреть данные" name="log_in" />
