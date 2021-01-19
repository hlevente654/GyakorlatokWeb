<?php
require_once "config.php";

if(isset($_POST['beir'])){
    $cim=$_POST['cim'];
    $rendezo=$_POST['rendezo'];
    $gyarto=$_POST['gyarto'];
    $ev=$_POST['ev'];
    $hossz=$_POST['hossz'];

    $sql="INSERT into filmek values(null,'{$cim}','{$rendezo}','{$gyarto}',{$ev},{$hossz})";
    $stmt=$db->exec($sql);
    $_SESSION['msg']=$stmt ? "Sikeres adatbeírás":"Sikertelen művelet";
    header("Location:index.php");
    
}
?>
<div class="col-6">
    <form method="post">
        Cím: <input type="text" name="cim" id="" class="form-control" required>
        Rendező: <input type="text" name="rendezo" id="" class="form-control" required>
        Gyártó: <input type="text" name="gyarto" id="" class="form-control" required>
        Gyártás éve: <input type="number" name="ev" id="" class="form-control" required>
        Hossz: <input type="number" name="hossz" id="" class="form-control" required>
        <input type="submit" value="Beír" name="beir" class="btn btn-outline-primary">
    </form>
</div>