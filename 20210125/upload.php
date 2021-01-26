<?php
session_start();
$_SESSION['fileNev']=""; 
$message = ''; 
if (isset($_POST['feltolt'])){
  if (isset($_FILES['feltoltottFile']) && $_FILES['feltoltottFile']['error'] === UPLOAD_ERR_OK){
    $fileTmpPath = $_FILES['feltoltottFile']['tmp_name'];
    $fileName = $_FILES['feltoltottFile']['name'];
    $fileSize = $_FILES['feltoltottFile']['size'];
    $fileType = $_FILES['feltoltottFile']['type'];
    $tomb = explode(".", $fileName);
    $fileExtension = strtolower(end($tomb));//end() megadja egy tömb utolsó elemét
    // a feltöltött fájl szóközöket és egyéb speciális karaktereket tartalmazhat, jobb a fájlnév megtisztítása
    // és egyedi fájlnevet adunk minden egyes feltöltött fájlnak
    //$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $newFileName = time()."_". $fileName. '.' . $fileExtension;
    // fájlkiterjesztés ellnőrzése:
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'pdf', 'docx');
 
    if (in_array($fileExtension, $allowedfileExtensions)){
        if($_FILES['feltoltottFile']['size']<=2000000) {
            // a könyvtár neve ahová fel szeretnénk tölteni a fájlt:
            $uploadFileDir = './feltoltesek/';
            $utvonal = $uploadFileDir . $newFileName;
            if(move_uploaded_file($fileTmpPath, $utvonal)){
                    $message ='Sikeres file feltöltés!';
                    $_SESSION['fileNev']=$newFileName;
            }else
                $message = 'Nem sikerült a fájl feltöltése!';
        }else
            $message="A max.feltoltheto meret 1M!"; 
    }else
      $message = 'A file kiterjesztése nem megengedett. A feltölthetőek: ' . implode(',', $allowedfileExtensions);
  }else{
    $message = 'Hiba történt a file feltöltése során.<br>';
    $message .= 'Error:' . $_FILES['feltoltottFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: index.php");