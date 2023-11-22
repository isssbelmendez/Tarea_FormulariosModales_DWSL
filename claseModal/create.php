<?php
include 'include/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $dui = $_POST["dui"];

    // Consulta para agregar una nueva persona
    $sql = "INSERT INTO personas (nombre, telefono, dui) VALUES (?, ?, ?)";

    // Utilizar sentencia preparada para evitar la inyección SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $telefono, $dui);

    if ($stmt->execute()) {
        echo "Persona agregada correctamente";
    } else {
        echo "Error al agregar persona: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
