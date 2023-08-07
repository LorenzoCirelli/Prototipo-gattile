<?php
require 'salva.php';
require 'Login.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type'); // Aggiungi questa linea

// Resto del codice rimane invariato
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['query'])) {
  require 'lista_gatti.php';
  if($data['query']=="r"){
    $key = $data['dati'][0];
    leggiDb($key);
  }else if($data['query']=="w"){
    $user = $data['dati'][2];
    $gatto = $data['dati'][0];
    $opz = $data['dati'][1];
    AggiornaDb($user,$gatto,$opz);
    echo json_encode($lista); 
  }else if($data['query']=="l"){
    Login($data['dati'][0][1]);
  }

} else {
  echo json_encode(['status' => 'error', 'query' => 'No message received']);
}
?>