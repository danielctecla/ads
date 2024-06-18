<?php 
    session_start();

    if (!isset($_SESSION['rfc'])) {
        echo '
            <script>
                window.location = "../login/login.php"
            </script>
        ';
        session_destroy();
        die();
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include 'conexion_bd.php';

    $rfc_auditado = $_POST['rfc'];
    $folio = $_POST['folio'];
    $ano_fiscal = $_POST['ano-fiscal'];
    $titulo = $_POST['titulo'];
    $lugar_revision = $_POST['lugar-revision'];
    $date = date('Y-m-d');
    $otros = $_POST['otros'];
    $rfc_auditor = $_SESSION['rfc'];

    $opciones_seleccionadas = '';
    $opciones_seleccionadas .= isset($_POST['opcion1']) ? 'Factura ' : '';
    $opciones_seleccionadas .= isset($_POST['opcion2']) ? 'Libro Contable ' : '';
    $opciones_seleccionadas .= isset($_POST['opcion3']) ? 'Balance General ' : '';

    $opciones_seleccionadas = trim($opciones_seleccionadas);

    if($opciones_seleccionadas == ''){
        $opciones_seleccionadas = 'S/N';
    }

    if($otros == ''){
        $otros = 'S/N';
    }

    if (is_uploaded_file($_FILES['file_auditoria']['tmp_name'])) {
        $contenidoAuditoria = mysqli_real_escape_string($conexion, file_get_contents($_FILES['file_auditoria']['tmp_name']));
        $contenidoAuditoria = "'$contenidoAuditoria'"; // Agregar comillas simples alrededor del contenido
    } else {
        $contenidoAuditoria = "NULL"; // NULL como cadena para la consulta SQL
    }

    if (is_uploaded_file($_FILES['file_anexos']['tmp_name'])) {
        $contenidoAnexos = mysqli_real_escape_string($conexion, file_get_contents($_FILES['file_anexos']['tmp_name']));
        $contenidoAnexos = "'$contenidoAnexos'"; // Agregar comillas simples alrededor del contenido
    } else {
        $contenidoAnexos = "NULL"; // NULL como cadena para la consulta SQL
    }
    
    $query_insert = "
        INSERT INTO auditoria (
            folio, rfc_auditor, rfc_auditado, ano_fiscal, titulo, lugar_revision,
            documentacion, otros, fecha_elaboracion, estado, file_auditoria, anexos
        ) VALUES (
            '$folio', '$rfc_auditor', '$rfc_auditado', '$ano_fiscal', '$titulo', '$lugar_revision',
            '$opciones_seleccionadas', '$otros', '$date', 'pendiente', $contenidoAuditoria, $contenidoAnexos
        )
    ";
    
    $ejecutar = mysqli_query($conexion, $query_insert);

    if (!$ejecutar) { 
        mysqli_close($conexion);
        echo ' 
            <script>
                alert("Hubo un error al registrar la auditoria");
                window.location = "../registrar-auditoria.php";
            </script>';
    }

    mysqli_close($conexion);
    echo ' 
        <script>
            alert("Auditoria registrada con exito");
            window.location = "../menu.php";
        </script>';
?>