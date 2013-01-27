<?php
error_reporting(E_ERROR);
if(empty($_POST) && empty($_GET))
{
    exit('invalid request');
}
$_GET['mod'] = $_POST['mod'] = 'yy';
include('../index.php');
?>