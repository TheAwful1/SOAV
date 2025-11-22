<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>
</head>
<body>
<!--Aqui quiero que se vea como un perfil de usuario comun, que se puedan ver tus reservas anteriores y la actual, que haya un boton para hacer una solicitud-->

<!--Acuerdate de añadirle los campos que le faltan, telefono, cedula, direccion-->
<div id="Usuario">
        <div style="display:none;">
          <label  id="id"></label>
        </div>
        <div id="Nombre">
          <label id="Nombre"></label>
        </div>
        <div>
          <label id="Contraseña"></label>
        </div>
        <div id="Correo">
          <label id="Correo"></label>
        </div>
    </div>
    
<form id="formEditarUsuario">
  <input type="text" style="display: none;" name="id">
  <input type="text" name="nombre">
  <input type="text" name="email">
  <input type="text" name="password">
  <button type="submit">Guardar Cambios</button>
</form>



<script src="public\js\usuarios\editar.js"></script>    
<script src="public\js\usuarios\ver.js"></script>    

</body>
</html>