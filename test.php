<?php
$str = "Hello";
echo md5($str);

if (md5($str) == "8b1a9953c4611296a827abf8c47804d7")
  {
  echo "<br>Hello world!";
  exit;
  }
?>
