<?php
include ("connect.php");
if(empty($_SESSION['login']))
{
	echo "Доступ на эту страницу разрешен только зарегистрированным пользователям. Если вы зарегистрированы, то войдите на сайт под своим логином и паролем <br><a href='index.php'>Авторизоваться</a>";
}
else
{
$color = "coral red";
echo "Вы вошли на сайт, как <font color=$color>" .$_SESSION['login']."</font> <a href='exit.php'>Выйти</a>";
echo " <br>";
echo "Вы можете просмотреть список заявок <a href='proverka1.php'>Список заявок</a>";
echo " <br>";
echo "Или добавить заявку <a href='proverka.php'>Добавить заявку</a>";
}
?>
