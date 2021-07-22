
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>掲示板</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
  <form action="kanryou.php" method="post">
    <p>名前</p>
    <input type="text" name="a">
    <p>コメント</p>
    <textarea name="b"></textarea>
    <input type="submit" value="送信">
    <br><br>
  </form>

  <?php
        $db = new PDO("mysql:host=localhost;dbname=sumple", "root", "");

        $n = $db->query("select * from testdata order by no desc limit 10");
        while ($i = $n -> fetch()) {
          print "{$i['no']}: {$i['name']} {$i['time']}<br>"
              .nl2br($i['message'])."<hr>";
        }
  ?>
</body>
</html>
