<?php
// Incluir conexión a la base de datos
include 'conexion_bd.php';

// Asegúrate de que el ID del archivo esté presente
if (isset($_GET['id'])) {
    $idArchivo = $_GET['id'];

    // Obtener el BLOB del archivo de la base de datos
    $query = "SELECT archivo_informe FROM informes WHERE folio_informe = '$idArchivo'";
    $resultado = mysqli_query($conexion, $query);
    
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $contenidoArchivo = $fila['archivo_informe']; // El BLOB

        // Enviar los encabezados adecuados para un archivo PDF
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $idArchivo . '.pdf"'); // Ajusta el nombre del archivo según necesites
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($contenidoArchivo));
        ob_clean();
        flush();
        // Enviar el contenido del BLOB
        echo $contenidoArchivo;
        exit;
    } else {
        echo "Archivo no encontrado.";
    }

    header("Location: ../informes.php?folio-informe=$idArchivo");
}
?>