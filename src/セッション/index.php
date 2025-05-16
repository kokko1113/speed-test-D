<?php 
session_start();
if($_POST["num"]){//POSTで送る！！
  $_SESSION["num"]=$_POST["num"];
}
$num=$_SESSION["num"];
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>C5</title>
  </head>
  <body>
    <form action="./" method="post">
      <input type="number" name="num" value="<?php echo $num?>">
      <button>保存</button>
    </form>
  </body>
</html>