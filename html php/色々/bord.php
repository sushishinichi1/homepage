
<?php
$name="";
$message="";

if(isset($_POST['send'])===true){
  $name=$_POST["name"];
  $message=$_post["message"];
  $fp =fopen("bord.txt","a");
  fwrite($fp,$name."t".$message."n");
  fclose($fp)
}
?>
