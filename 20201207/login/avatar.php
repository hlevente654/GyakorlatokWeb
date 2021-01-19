<?php
print_r($_FILES);
	 if (array_key_exists('foto', $_FILES) && $_FILES['foto']['error'] == 0) {
		if($_FILES['foto']['size']>2000000) 
			$msg_foto="a max.feltoltheto meret 2M!";
		//$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$allowedTypes = array(IMAGETYPE_PNG);
		$detectedType = exif_imagetype($_FILES['foto']['tmp_name']);
		if(!in_array($detectedType, $allowedTypes))
			$msg_foto="csak png toltheto fel !";
		if($msg_foto==''){
			$from = $_FILES['foto']['tmp_name'];
			$to = 'avatar/' . $_FILES['foto']['name'];
			if(move_uploaded_file($from, $to)){ 
				$pont = strpos($_FILES['foto']['name'],'.');
				$ext=substr($_FILES['foto']['name'],$pont);
				$new_name= 'avatar/'.$fnev.$ext;
				rename($to , $new_name);
				//header("location:index.php");
			}
		}			
    }else $msg_foto= 'Hiba tortent, a foto feltoltese nem sikerult!';   
?>    