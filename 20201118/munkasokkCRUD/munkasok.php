<?php
session_start();
print_r(session_id());

	require_once 'config.php';
	
	$tbl="";
	$sql="select az,nev,kezdev from munkasok order by nev";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
		$id=$row['az'];
    	$tbl.="<tr><td>{$id}</td><td>{$row['nev']}</td><td>{$row['kezdev']}</td>";           
             $tbl.="<td class=' btn btn-outline-light m-1'><a  href='edit.php?id=$id'>Edit</a></td>";
		     $tbl.="<td class=' btn btn-outline-light  m-1'><a  href='delete.php?id=$id'>Delete</a></td></tr>";
	}
	
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<script src="bootstrap/jquery.min.js"></script>
		<script src="bootstrap/bootstrap.min.js"></script>
        <title>Munkasok</title>
	</head>
<body>
<div class="container border p-3">
  <h2 class="text-center">Alkalmazottak nyilvántartása</h2>
  <div class="row ">
	 <div class="col-md-4"  ><?=isset($_SESSION['msg'])? $_SESSION['msg']: "" ?></div>
	 <div class="col-md-4 text-center shadow p-3 m-1  rounded">
	 	<div class="btn btn-outline-light  m-1 p-1 rounded"><a  href="insert.php"><b>Insert</b> (uj alkalmazott bevezetese)</a></div>
	  </div>
  </div>
	<div class="row shadow p-1 bg-light">
	  <div class="col-md-12">
		 <div class="table-responsive">
		   <table class="table table-hover table-fixed-border" >
			   <thead><tr><th scope="col">Azonosito</th><th scope="col">Nev</th><th scope="col">Kezdesi ev</th><th scope="col">&nbsp</th><th scope="col">&nbsp</th></tr></thead>
			   <tbody ><?=$tbl?></tbody>
		  </table>
		</div>
	  </div>
	</div>
</div>
</body>
</html>
