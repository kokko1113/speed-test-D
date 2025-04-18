<?php
$dsn = "mysql:host=mariadb;dbname=user;charset=utf8mb4";
$user = "root";
$pass = "root";
$name = $_GET["name"];
$price = $_GET["price"];
try {
    $pdo = new PDO($dsn, $user, $pass);
    if ($name != "" && $price != "") {
        $stmt = $pdo->query("SELECT * FROM items WHERE name LIKE '%" . $name . "%' AND price=" . $price);
    } else if ($price != "") {
        $stmt = $pdo->query("SELECT * FROM items WHERE price=" . $price);
    } else if ($name != "") {
        $stmt = $pdo->query("SELECT * FROM items WHERE name LIKE '%" . $name . "%'");
    } else {
        $stmt = $pdo->query("SELECT * FROM items");
    }
} catch (PDOException $e) {
    echo "error";
    echo $e->getMessage();
    exit();
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
        name:<input type="text" name="name" id="">
        price:<input type="number" name="price" id="">
        <button>検索</button>
    </form>

    <?php foreach ($stmt as $data): ?>
        <?php echo $data["id"] . ":" . $data["name"] . "￥" . $data["price"]; ?>
        <br>
    <?php endforeach; ?>
</body>

</html>