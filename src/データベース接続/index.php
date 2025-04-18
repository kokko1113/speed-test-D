<?php
$dsn="mysql:host=mariadb;dbname=test;charset=utf8mb4";
$user="root";
$pass="root";
try{
    $pdo=new PDO($dsn,$user,$pass);
    $stmt=$pdo->query("SELECT * FROM items");
}catch (PDOException $e){
    echo "error";
    echo $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($stmt as $data): ?>
        <?php echo $data["id"].":".$data["name"]."￥".$data["price"]; ?>
        <br>
    <?php endforeach; ?>
</body>

</html>