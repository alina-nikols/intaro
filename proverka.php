<?php
session_start();
if(empty($_SESSION['login']))
{
	echo "������ �� ��� �������� �������� ������ ������������������ �������������. ���� �� ����������������, �� ������� �� ���� ��� ����� ������� � ������� <br><a href='index.php'>��������������</a>";
}
else
{
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=zayavka.php">';
}
?>