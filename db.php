<?php 

require "RedBean/rb.php";

R::setup('mysql:host=localhost;dbname=cva','root','root');

session_start();

//для вывода списка ошибок
function showError($errors){
    return array_shift($errors);
}

?>