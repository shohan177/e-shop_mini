<?php 

require_once "app/db.php";
require_once "app/function.php";

echo $id = $_GET['id'];

$sql = "DELETE FROM product WHERE ID ='$id'";
$connection -> query($sql);

header('location:all.php');