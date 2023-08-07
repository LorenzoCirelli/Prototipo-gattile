<?php
function Login($key){
    require 'db.php';
    $sql = "SELECT `Token` FROM `account` WHERE Token = $key";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo json_encode(['success' => 'true', 'key' => $row['Token']]); 
       }
    } 
    $conn->close();
}



?>