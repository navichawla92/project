<html>

<form method="post" action="">
  <input type="text" name="num">
  <input type="submit" value="get table">
</form>

</html>

<?php

if (isset($_POST["submit"])){

$num = isset($_POST["num"]) ? $_POST["num"] : "";


  if($num) {
  for($i = 1; $i <= 10; $i++)
  {
  $mul = $num * $i;
  echo "$num * $i = $mul<br>";
  }
  } else {
  echo "invalid entry!";
  }
}
?>
