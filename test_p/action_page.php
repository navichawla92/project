
<?php
$name = $_POST['name'];
echo "<p>",$_POST["name"],"</p>";
echo "<p>",$_POST["action"],"</p>";
echo "<p>",$_POST["address"],"</p>";
$address = array();
if($_POST["action"]=="lookup"){
$fh = fopen("address.txt","r") or die("No such file found.");
while(!feof($fh)) {
   $line = fgets($fh);
   $info = explode("|",$line);
   $address[$info[0]]=$info[1];
   }
if(array_key_exists($_POST["name"],$address)) {
   echo "<p>",$_POST["name"],"<p>";
   echo "<p>",$address[$_POST["name"]],"</p>";

}

}
?>


