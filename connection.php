<?php 

$Host = "localhost";
$Name = "root";
$Password = "";
$Database = "project2";

$con = mysqli_connect($Host, $Name, $Password, $Database);
if(!$con)
{
    echo "Connection unsuccessfull";
}

?>