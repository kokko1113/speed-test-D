<?php
// $arr=[1,1,2,3,4,5,4,3,4,5,3,5,6,7,8,8,8,6,4,4,3,2,4];
$arr = ["a", "c", "a", "a", "b", "b", "a"];
$data = array_count_values($arr);
$max = max($data); //配列から最大値を取得する。
$result = array_keys($data, $max);
echo $result[0];
?>