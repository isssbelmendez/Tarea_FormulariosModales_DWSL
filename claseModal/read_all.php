<?php

include 'include/db.php';

// Consulta SQL para seleccionar todos los registros de la tabla 'personas'
$sql = "SELECT * FROM personas";

// Prepara la consulta SQL para su ejecución
$stmt = $conn->prepare($sql);

// Verifica si la ejecución de la consulta fue exitosa
if ($stmt->execute()) {
    // Obtiene el resultado de la consulta
    $result = $stmt->get_result();

    // Verifica si hay al menos un resultado
    if ($result->num_rows > 0) {
        // Inicializa un arreglo para almacenar los resultados
        $personas = array();

        // Itera sobre los resultados y los agrega al arreglo
        while ($row = $result->fetch_assoc()) {
            $personas[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'telefono' => $row['telefono'],
                'dui' => $row['dui']
            );
        }

        // Convierte el arreglo a formato JSON y lo imprime
        echo json_encode($personas);
    } else {
        // Si no hay resultados, imprime un arreglo JSON vacío
        echo json_encode(array());
    }

    // Cierra la sentencia preparada
    $stmt->close();
} else {
    // Si la ejecución de la consulta falla, imprime un arreglo JSON vacío
    echo json_encode(array());
}

// Cierra la conexión a la base de datos
$conn->close();
?>
