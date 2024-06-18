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

    if(!isset($_GET['folio'])){
        header ('Location: ../status.php');
        exit;
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include 'conexion_bd.php';
    $estado = 'revisada';

    $irregularidades = $_POST['irregularidades'];

    if($irregularidades == ''){
        $estado = 'finalizada';    
    }

    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
        $archivo = mysqli_real_escape_string($conexion, file_get_contents($_FILES['archivo']['tmp_name']));
        $archivo = "'$archivo'"; // Agregar comillas simples alrededor del contenido
    } else {
        $archivo = "NULL"; // NULL como cadena para la consulta SQL
    }
    
    $query_insert = "
        INSERT INTO informes (folio_auditoria,irregularidades,archivo_informe) values 
        ('".$_GET['folio']."','$irregularidades',$archivo)
    ";
    
    $ejecutar = mysqli_query($conexion, $query_insert);

    if (!$ejecutar) { 
        mysqli_close($conexion);
        echo ' 
            <script>
                alert("Hubo un error al registrar el informe");
                window.location = "../registrar-auditoria.php";
            </script>';
    }

    $query_update = "UPDATE auditoria SET estado = '$estado' WHERE folio = '".$_GET['folio']."'";
    $ejecutar = mysqli_query($conexion, $query_update);
    if (!$ejecutar) { 
        mysqli_close($conexion);
        echo ' 
            <script>
                alert("Hubo un error al actualizar el estado de la auditoría");
                window.location = "../registrar-auditoria.php";
            </script>';
    }

    mysqli_close($conexion);
    echo ' 
        <script>
            alert("Informe registrada con exito");
            window.location = "../menu.php";
        </script>';
?>