<?php
require_once('config.php');
$ar=$str="";
if(isset($_POST['ar']) && $_POST['ar']>0  ){
	$ar=$_POST['ar'];
	$stmt=$db->query("select tipus from termekek where ar>{$ar}");
	if($stmt->rowCount()>=1){
		$str="<th>tipus</th>";
		while($row=$stmt->fetch()){
			$str.="<tr><td>".$row['tipus']."</td></tr>";
		}
	}else $str="nincs ilyen termek";
}
?>
<h3>Listázza ki azokat a gépeket típussal, melyek ára adott ár feletti. Ezt az árat a felhasználótól kérje be!</h3>
<form action="" method="post">  
	 Az ár: <input type="number" name="ar" min="0" value="<?=$ar?>" required>
	 <input type="submit" value="listazás"> 
</form>
<div id="output"><table><?=$str?></table></div>
