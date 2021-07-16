<?php 

$par1_ip = "localhost";
$par2_name = "root";
$par3_p = "";
$par4_db = "zxc";

$connect = mysqli_connect($par1_ip,$par2_name,$par3_p,$par4_db);

if ($connect == false)
{
    echo "Ошибка подключения!";
}

mysqli_query($connect, "SET NAMES utf8");
?>