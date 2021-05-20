<?php 

require "RedBean/rb.php";

R::setup('mysql:host=localhost;dbname=cva','root','root');

//для вывода списка ошибок
function showError($errors){
    return array_shift($errors);
}

?>