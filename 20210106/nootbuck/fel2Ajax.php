<?php
require_once 'config.php';
if(isset($_GET['ram'])){
	$stmt=$db->query("select gyarto,tipus from termekek where floor(memoria/1000)={$_GET['ram']}");
	if($stmt->rowCount()>=1){
		$str="<th>gyarto</th><th>tipus</th>";
		while($row=$stmt->fetch()){
			$str.="<tr><td>".$row['gyarto']."</td><td>".$row['tipus']."</td></tr>";
		}
		echo $str;
	}else echo "nincs ilyen termek";
}
else echo "hiba !";
?>