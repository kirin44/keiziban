
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>掲示板</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
  <form method="post">
    <p>名前</p>
    <input type="text" name="a">
    <p>コメント</p>
    <textarea name="b"></textarea>
    <input type="submit" value="送信">
    <br><br>
  </form>

  <?php
    if(!empty($_POST["a"]) && !empty($_POST["b"])) {
      $a = htmlspecialchars($_POST["a"], ENT_QUOTES);
      $b = htmlspecialchars($_POST["b"], ENT_QUOTES);

      $db = new PDO("mysql:host=localhost;dbname=sumple", "root", "");

      $db->query("INSERT INTO testdata (no,name,message,time)
        values (NULL,'$a','$b',NOW())");

      $n = $db->query("select * from testdata order by no desc");
      while ($i = $n -> fetch()) {
        print "{$i['no']}: {$i['name']} {$i['time']}<br>"
              .nl2br($i['message'])."<hr>";
      }
    } else {
        $db = new PDO("mysql:host=localhost;dbname=sumple", "root", "");

        $n = $db->query("select * from testdata order by no desc");
        while ($i = $n -> fetch()) {
          print "{$i['no']}: {$i['name']} {$i['time']}<br>"
              .nl2br($i['message'])."<hr>";
        }
    }
  ?>
</body>
</html>
