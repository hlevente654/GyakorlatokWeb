<?php
require_once "config.php";
$optStr=$cim=$rendezo=$gyarto=$ev=$hossz="";
$sql="SELECT id,cim from filmek";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
    $optStr.="<option value='{$row['id']}'>{$row['cim']}</option>";
}
print_r($_POST);

//megjelenit

if(isset($_POST['filmId'])&& $_POST['filmId']!=0){
    $selectedId=$_POST['filmId'];
    $sql="SELECT * from filmek where id={$selectedId}";
    $stmt=$db->query($sql);
    $row=$stmt->fetch();

    $cim=$row['cim'];
    $rendezo=$row['rendezo'];
    $gyarto=$row['gyarto'];
    $ev=$row['ev'];
    $hossz=$row['hossz'];


}

//modositas

------------------------------------------

?>
<div>
    <form method="post">
        <select name="filmId">
            <option value="0">valassz egy filmet</option>
            <?=$optStr?>
        </select>
        <input type="submit" value="Kiválaszt" name="kivalaszt">
    </form>
<form method="post">
        Cím: <input type="text" name="cim" id="" class="form-control" value="<?=$cim?>" required>
        Rendező: <input type="text" name="rendezo" id="" class="form-control" value="<?=$rendezo?>" required>
        Gyártó: <input type="text" name="gyarto" id="" class="form-control" value="<?=$gyarto?>" required>
        Gyártás éve: <input type="number" name="ev" id="" class="form-control" value="<?=$ev?>" required>
        Hossz: <input type="number" name="hossz" id="" class="form-control" value="<?=$hossz?>" required>
        <input type="submit" value="Módosítás" name="modosit" class="btn btn-outline-primary">
    </form>
</div>