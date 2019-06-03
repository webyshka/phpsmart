<?php
require_once 'class.Calendar.php';
$res = new Calendar();
$res->init('17.11.2013');
echo $res->findDate();