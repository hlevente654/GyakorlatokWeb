<?php
require_once 'config.php';
$stmt=$db->query("select * from tanulok where osztaly='1A' order by nev");
$lista="";
while($row=$stmt->fetch()){
	//print_r($row);
	//echo $row['nev'];
	//echo "<br>";
	$lista.="<li class='btn btn-outline-info w-100 m-1' id='".$row['tazon']."'>".$row['nev']."</li>";
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Papirgyujtes</title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
	<script src="fel.js"></script>
	<title>Papirgyujtes</title>

</head>
<body>
	<div class="container">
		<h3>1A osztaly nevsora: </h3>
	<div class="row">
		<div class="col-4">
			<ol id="nev"><?=$lista?></ol>
	</div>
	<div class="col-4">
	<table class="table-bordered">
		<thead>
			<th>Leadások időpontja</th>
			<th>Mennyiség</th>
		</thead>
		<tbody id="output"></tbody>
	</table>
	
	</div>
	</div>
</div>
</body>
</html>

