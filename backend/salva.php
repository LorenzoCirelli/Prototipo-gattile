<?php
function AggiornaDb($user,$id,$res) {
    require 'db.php';
    $data1 = mysqli_real_escape_string($conn, $user);
    $sql = "INSERT INTO `correlazioni`(`Gatto`, `Risulatato`, `utente`) VALUES ( $id, $res,'$data1')";
    $conn->query($sql);
    
    $conn->close();
     
}

?>