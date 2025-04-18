<?php
a(2022);

function a($year) {
    for ($i = 1; $i <= 12; $i++) {
        $date = date("t", strtotime("$year-$i-01"));
        echo $i . "月" . $date . "日/";
    }
}
