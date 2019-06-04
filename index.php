<?php
require_once 'class.Calendar.php';
try {
    $res = new Calendar();
    $res->init('23.11.2013');
    echo $res->findDate();
} catch (Exception $e) {
    die ($e->getMessage());
}
