<?php
$json = json_decode(file_get_contents("./data.json",true));
// header("Content-Type:application/json");
$page=$_GET["page"];
$arr=array_slice($json,$page*10,10);
echo json_encode($arr);
?>
