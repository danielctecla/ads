<?php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include 'conexion_bd.php';

    $nombre = $_POST['nombres'];
    $correo = $_POST['correo'];
    $rfc = $_POST['rfc'];
    $contrasena = $_POST['contrasena'];
    $type_user = $_POST['nivel_accesos'];
    $curp = $_POST['curp'];
    $domicilio = $_POST['domicilio'];
    // Encriptacion de la contraseña
    $contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

    if ($type_user == "auditor") {
        $nodepartamento = $_POST['nodepartamento'];
        $idauditor = $_POST['idauditor'];
    } else {
        $claveaduana = $_POST['claveaduana'];
        $acuseelectronico = $_POST['acuseelectronico'];
    }
    // Verificacion de no repeticion de correo

    $query_select = "SELECT * FROM usuarios WHERE correo = '$correo' or rfc = '$rfc'";
    $verificar_correo = mysqli_query($conexion,  $query_select);
    if (mysqli_num_rows($verificar_correo) > 0) {
        mysqli_close($conexion);
        echo ' 
            <script>
                alert("Este correo ya esta registrado, intenta con otro");
                window.location = "../register.php";
            </script>';
        exit();
    }

    // Ejecucion de la consulta

    $query_insert = "INSERT INTO usuarios ( rfc, nombre, correo, contrasena, type, domicilio, curp) 
    VALUES ('$rfc', '$nombre', '$correo', '$contrasena', '$type_user', '$domicilio', '$curp')";

    $ejecutar = mysqli_query($conexion, $query_insert);

    if (!$ejecutar) { 
        mysqli_close($conexion);
        echo ' 
            <script>
                alert("Hubo un error al registrarse");
                window.location = "../register.php";
            </script>';
    }
    
    if ($type_user == "auditor") {
        $query_insert_auditor = "INSERT INTO auditor (rfc_usuarios, nodepartamento, id_auditor) 
        VALUES ('$rfc', '$nodepartamento', '$idauditor')";
        $ejecutar_auditor = mysqli_query($conexion, $query_insert_auditor);
    } else {
        $query_insert_aduana = "INSERT INTO auditado (rfc_usuarios, claveaduanera, acuse_electronico) 
        VALUES ('$rfc', '$claveaduana', '$acuseelectronico')";
        $ejecutar_aduana = mysqli_query($conexion, $query_insert_aduana);
    }

    mysqli_close($conexion);
    echo ' 
        <script>
            alert("Usuario registrado exitosamente");
            window.location = "./../../login/login.php";
        </script>';
    
?>