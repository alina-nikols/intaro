<?php
session_start();
if(empty($_SESSION['login'])) 
{
	echo "������ �� ��� �������� �������� ������ ������������������ �������������. ���� �� ����������������, �� ������� �� ���� ��� ����� ������� � �������<br><a href='index.php'>������� ��������</a>";
}
unset($_SESSION['password']);
unset($_SESSION['login']); 
unset($_SESSION['id']);
echo"<html><head><meta http-equiv='Refresh' content='0;URL=index.php'></head></html>";
?>