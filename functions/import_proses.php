<?php
require('../functions/config.php');
if(isset($_POST["Import"])) {
    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0){
        $file = fopen($filename, "r");
        while(($getData = fgetcsv($file, 1000, ",")) !== FALSE) {
            //add in row
            $save = "INSERT INTO pengguna (idPengguna, namaPengguna, kataLaluan, jenisPengguna)
            values (NULL,'".$getData[1]."','".$getData[2]."','".$getData[3]."')";
            
            $result = mysqli_query($samb,$save);
            if(isset($result)) {
                echo "<script type=\"text/javascript\">alert(\"Pindah naik fail CSV gagal\"); window.location = \"../pages/import_pekerja.php\"</script>";
            }
        }fclose($file);
    }
}
?>