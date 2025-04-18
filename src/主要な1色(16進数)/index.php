<?php
$img = imagecreatefrompng("./image.png");
$width = imagesx($img);
$height = imagesy($img);
$colors = [];
for ($x = 0; $x < $width; $x++) {
    for ($y = 0; $y < $height; $y++) {
        $rgb = imagecolorat($img, $x, $y);
        $color = imagecolorsforindex($img, $rgb);
        $red = $color["red"];
        $green = $color["green"];
        $blue = $color["blue"];
        $arrKey = $red . "," . $green . "," . $blue;
        if (isset($colors[$arrKey])) {
            $colors[$arrKey]++;
        } else {
            $colors[$arrKey] = 1;
        }
    }
}
arsort($colors);
$top=key(array_slice($colors,0,1));
$topArr=explode(",",$top);
$red=dechex($topArr[0]);
$green=dechex($topArr[1]);
$blue=dechex($topArr[2]);
echo "#".$red.$green.$blue;
?>
