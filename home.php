<?php
session_start();
$color = "coral red";
echo "�� ����� �� ����, ��� <font color=$color>" .$_SESSION['login']."</font> <a href='exit.php'>�����</a>";
echo " <br>";
echo "�� ������ ����������� ������ ������ <a href='proverka1.php'>������ ������</a>";
echo " <br>";
echo "��� �������� ������ <a href='proverka.php'>�������� ������</a>";
?>