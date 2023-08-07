<?php
function leggiDb($key) {
  require 'Gatto_class.php';

    $lista = [];

    require 'db.php';

    // Controlla se $data1 è un numero intero
    if (is_numeric($key)) {
        $data1 = (int)$key; // Trasforma $data1 in un numero intero
    } else {
        $data1 = "'" . mysqli_real_escape_string($conn, $key) . "'"; // Inserisci le virgolette se $data1 è una stringa
    }

    $sql = "SELECT `Id`, `Nome`, `Foto`, `Eta` 
            FROM `gatti`
            WHERE `Id` NOT IN (SELECT `Gatto` FROM `correlazioni` WHERE `utente` = $data1);";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($lista, new Gatto($row["Nome"], $row["Eta"], "http://127.0.0.1/Progetti/gattile_backend/storage/" . $row["Foto"], $row["Id"]));
        }
    }

    $conn->close();
    echo json_encode($lista);
}
?>
