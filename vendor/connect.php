<?php 

//соединяемся с базой данных

$connect = mysqli_connect('localhost','root','root','logreg3');

//проверяем соединение с БД
if(!$connect){
    die('Error connect to Database');
} else{
    // echo 'Working!';
}