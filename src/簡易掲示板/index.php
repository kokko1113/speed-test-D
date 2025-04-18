<?php
if ($_GET["name"] != "" && $_GET["content"] != "") {
    $name = $_GET["name"];
    $content = $_GET["content"];
    $date = date("Y-m-d H:i:s");
    $json = json_decode(file_get_contents("./log.json"));
    if (!is_array($json)) {
        $json = [];
    }
    array_push($json, ["name" => $name, "content" => $content, "date" => $date]);
    file_put_contents("./log.json", json_encode($json));
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
    <form action="." method="get">
        名前:<input type="text" name="name" id="">
        内容:<input type="text" name="content" id="">
        <button>投稿</button>
    </form>

    <?php $json = json_decode(file_get_contents("./log.json")); ?>
    <?php foreach ($json as $data): ?>
        <?php echo $data->date . "/" . $data->name . "/" . $data->content; ?>
        <br>
    <?php endforeach; ?>
</body>

</html>