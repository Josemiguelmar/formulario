<?php 

include("CONEXION.PHP"); 

if (isset($_POST["register"])) {
   
    if (
        strlen($_POST["nombre"]) >= 1 &&
        strlen($_POST["apellido"]) >= 1 &&
        strlen($_POST["direccion"]) >= 1 &&
        strlen($_POST["telefono"]) >= 1 &&
        strlen($_POST["cedula"]) >= 1
    ) {
        $nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_STRING);
        $apellido = filter_var(trim($_POST["apellido"]), FILTER_SANITIZE_STRING);
        $direccion = filter_var(trim($_POST["direccion"]), FILTER_SANITIZE_STRING);
        $telefono = filter_var(trim($_POST["telefono"]), FILTER_SANITIZE_STRING);
        $cedula = filter_var(trim($_POST["cedula"]), FILTER_SANITIZE_STRING);
        $fecha = date("Y-m-d"); 

        if (!$conex) {
            die("<h3 class='error'>Error de conexión a la base de datos: " . mysqli_connect_error() . "</h3>");
        }

    
        $checkTelefono = $conex->prepare("SELECT telefono FROM usuario WHERE telefono = ?");
        if (!$checkTelefono) {
            die("<h3 class='error'>Error en la preparación de la consulta: " . $conex->error . "</h3>");
        }
        $checkTelefono->bind_param("s", $telefono);
        $checkTelefono->execute();
        $checkTelefono->store_result();

        if ($checkTelefono->num_rows > 0) {
          
            echo '<h3 class="error">El número de teléfono ya está registrado Utiliza otro.</h3>';
            $checkTelefono->close();
        } else {
            
            $checkTelefono->close();

            $stmt = $conex->prepare("INSERT INTO usuario(nombre, apellido, direccion, telefono, cedula, Fecha) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                die("<h3 class='error'>Error en la preparación de la consulta: " . $conex->error . "</h3>");
            }

            $stmt->bind_param("ssssss", $nombre, $apellido, $direccion, $telefono, $cedula, $fecha);
            $resultado = $stmt->execute();

            if ($resultado) {
                echo '<h3 class="success">Bienvenido a la empresa D, J & Y</h3>';
            } else {
                echo '<h3 class="error">Ocurrió un error al registrar: ' . $stmt->error . '</h3>';
            }

            $stmt->close();
        }
    } else {
        echo '<h3 class="error">Por favor, llena todos los campos</h3>';
    }
}
?>

