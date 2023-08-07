<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type'); 

// Resto del codice rimane invariato
$data = json_decode(file_get_contents('php://input'), true);
$favoriti = [];
if (isset($data['query'])) {
    require 'Gatto_class.php';
    require 'db.php';
    $key = $data['query'];
     // Controlla se $data1 è un numero intero
   
        $data1 = mysqli_real_escape_string($conn, $key);
    
    $sql = "SELECT `Id`, `Nome`, `Foto`, `Eta` 
    FROM `gatti`
    WHERE `Id` IN (SELECT `Gatto` FROM `correlazioni` WHERE `utente` = '$data1' AND Risulatato = 1)";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
        array_push($favoriti,new Gatto($row["Nome"],$row["Eta"],$row["Foto"],$row["Id"]));
    }
    echo json_encode($favoriti);
 } 
 $conn->close();
} else {
  echo json_encode(['status' => 'error', 'query' => 'No message received']);
}
?>
