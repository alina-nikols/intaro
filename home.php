<?php
session_start();
$color = "coral red";
echo "Вы вошли на сайт, как <font color=$color>" .$_SESSION['login']."</font> <a href='exit.php'>Выйти</a>";
echo " <br>";
echo "Вы можете просмотреть список заявок <a href='proverka1.php'>Список заявок</a>";
echo " <br>";
echo "Или добавить заявку <a href='proverka.php'>Добавить заявку</a>";
?>