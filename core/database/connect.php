<?php
$connect_error = "Sorry we are experiencing downtime.";
mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('hub') or die($connect_error);
?>