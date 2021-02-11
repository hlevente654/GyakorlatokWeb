<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Magántanár</title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
	<script src="menu.js"></script>
	<link rel="stylesheet" href="style.css">            
</head>

<body>
<div class="container ">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MAGÁNTANÁR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Főoldal</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?p=feladat1.php">Tanárok</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?p=feladat2.php">Diákok</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="index.php?p=feladat3.php">Tanár-tanítvány</a>
			</li>
		</ul>
  </div>

</nav>


    <div class="tartalom">
		<?php
			if(isset($_GET['p'])){
				include $_GET['p'];

			}
			else{
			include("fooldal.php");
			}

		?>
	</div>	
           
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>  
</body>
</html>            