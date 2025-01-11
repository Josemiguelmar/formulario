<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link rel="stylesheet" href="./STYLE.CSS">
</head>
<body>
    <form method="POST">
        <h1><b>Empresa D, J & Y</b></h1>
        <div class="input-wrapper">
            <input type="text" name="nombre" placeholder="Nombre">
            <img class="input-icon" src="./name.svg" alt="">
        </div>
        <div class="input-wrapper">
            <input type="text" name="apellido" placeholder="Apellido">
            <img class="input-icon" src="./email.svg" alt="">
        </div>
        <div  class="input-wrapper">
            <input type="text" name="direccion" placeholder="Dirección">
            <img class="input-icon" src="./direction.svg" alt="">
        </div>
        <div class="input-wrapper">
        <input type="text" id="telefono" name="telefono" placeholder="Teléfono" maxlength="14">
            <img class="input-icon" src="./phone.svg" alt="">
        </div>
        <div class="input-wrapper">
            <input type="text" name="cedula" id="cedula" placeholder="Cédula" maxlength="13">
            <img class="input-icon" src="./password.svg" alt="" >
        </div>
        <input class="btn" type="submit" name="register" value="Enviar">
    </form>

    <script>
     
        const telefonoInput = document.getElementById('telefono');
        telefonoInput.addEventListener('input', (event) => {
            let value = event.target.value;

            
            value = value.replace(/\D/g, '');

           
            if (value.length > 3 && value.length <= 6) {
                value = value.replace(/(\d{3})(\d+)/, '($1) $2');
            } else if (value.length > 6) {
                value = value.replace(/(\d{3})(\d{3})(\d+)/, '($1) $2-$3');
            }

           
            event.target.value = value;
        });

        
        const cedulaInput = document.getElementById('cedula');
        cedulaInput.addEventListener('input', (event) => {
            let value = event.target.value;

          
            value = value.replace(/\D/g, '');

           
            if (value.length > 3 && value.length <= 10) {
                value = value.replace(/(\d{3})(\d+)/, '$1-$2');
            } else if (value.length > 10) {
                value = value.replace(/(\d{3})(\d{7})(\d+)/, '$1-$2-$3');
            }

            
            event.target.value = value;
        });
    </script>

    <?php include("REGISTRA.PHP") ?>
</body>
</html>



