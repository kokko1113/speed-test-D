<?php
$json = json_decode(file_get_contents("./log.json"));
if (!is_array($json)) {
    $json = [];
}
$name = $_GET["name"];
$mail = $_GET["mail"];
$tel = $_GET["tel"];
if ($name !== "" && $mail !== "" && $tel !== "") {
    $arr = ["name" => $name, "mail" => $mail, "tel" => $tel];
    array_push($json, $arr);
    file_put_contents("./log.json", json_encode($json));
    echo "保存しました";
} else {
    echo "未記入です";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="mail" placeholder="mail">
        <input type="text" name="tel" placeholder="tel">
        <button>Send</button>
    </form>
</body>

</html>