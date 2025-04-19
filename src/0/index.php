<?php
if(!isset($_GET["name"])){
    echo "name error";
}else if(strpos($_GET["mail"],"@")===false){
    echo "mail error";
}else if(){
    echo "mail error";
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
        name:<input type="text" name="name">
        mail:<input type="text" name="mail">
        tel:<input type="text" name="tel">
        <button>Send</button>
    </form>
</body>

</html>
<script>

</script>
<style>

</style>