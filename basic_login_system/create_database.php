<?php
try{
$connection=new PDO('mysql:host=localhost;charset=utf8','root','');
$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$st=$connection->prepare('create database if not exists log_sys;');
$st->execute();
$connection=new PDO('mysql:host=localhost;dbname=log_sys;charset=utf8','root','');
$connection->setAttribute(PDO::ATTR_ERRMODE
,PDO::ERRMODE_EXCEPTION);
$st=$connection->prepare('create table if not exists users(id int(3) primary key AUTO_INCREMENT, first_name varchar(35),last_name varchar(35),user_name varchar(35) UNIQUE );');
$st->execute();
$st=$connection->prepare('create table if not exists pass(id int(3) primary key AUTO_INCREMENT, pass_key text,user_name varchar(35) UNIQUE );');
$st->execute();
}

catch(PDOException $e)
{
    echo $e->getMessage();
}

?>