
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>掲示板</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
  <?php
    if(!empty($_POST["a"]) && !empty($_POST["b"])) {
      $a = htmlspecialchars($_POST["a"], ENT_QUOTES);
      $b = htmlspecialchars($_POST["b"], ENT_QUOTES);

      $db = new PDO("mysql:host=localhost;dbname=sumple", "root", "");

      $db->query("INSERT INTO testdata (no,name,message,time)
        values (NULL,'$a','$b',NOW())");

      print "<h1>コメント送信完了しました</h1>";
      print "<p><a href=index.php>掲示板に戻る</a></p>";

    } else {
      print "<h1>※フォームが入力されていません</h1>";
      print "<p><a href=index.php>掲示板に戻る</a></p>";
    }
  ?>
</body>
</html>
