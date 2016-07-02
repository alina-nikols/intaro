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

function display_db_table($zayavka, $connect)
{
	$query_string = "SELECT name,phone,problem FROM zayavka";
	$res_id = mysql_query($query_string, $connect);
	$column_count = mysql_num_fields($res_id);
	print ("<TABLE BORDER=1>\n");
	while ($row = mysql_fetch_row($res_id))
	{
	
		for ($column_num=0; $column_num<$column_count; $column_num++)
			print ("<TD>$row[$column_num]</TD\n");
		print("</TD>\n");
	}
	print ("<TABLE>\n");
	}

if($login == "admin")
{
	function display_db_table($zayavka, $connect)
{
	$query_string = "SELECT * FROM zayavka";
	$res_id = mysql_query($query_string, $connect);
	$column_count = mysql_num_fields($res_id);
	print ("<TABLE BORDER=1>\n");
	while ($row = mysql_fetch_row($res_id))
	{
	
		for ($column_num=0; $column_num<$column_count; $column_num++)
			print ("<TD>$row[$column_num]</TD\n");
		print("</TD>\n");
	}
	print ("<TABLE>\n");
	}
}
}
?>

<HTML>
<BODY>
<TABLE><TR><TD>
<?php display_db_table("", $connect)?>
</TD></TR></TABLE></BODY></HTML>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<b><br>Просмотр данных о заявке</b>
<form action="prosmotr.php" method="post">
<p>Название заявки: <input type="text" name="name" /></p>
<input type="submit" value="Просмотреть данные" name="log_in" />
