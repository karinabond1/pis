<?php

include_once 'config.php';

include_once 'lib/MySql.php';
include_once 'lib/Sql.php';

$mySql = new MySql();

if(isset($_POST['btn']) && $_POST['login'] && $_POST['password'])
{
    $insert = $mySql->setTable('users')->setValues($_POST['login'])->setValues($_POST['password'])->insert();
}

$users = $mySql->setTable('users')->select();


include_once 'templates/index.php';