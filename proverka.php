<?php
session_start();
if(empty($_SESSION['login']))
{
	echo "Доступ на эту страницу разрешен только зарегистрированным пользователям. Если вы зарегистрированы, то войдите на сайт под своим логином и паролем <br><a href='index.php'>Авторизоваться</a>";
}
else
{
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=zayavka.php">';
}
?>