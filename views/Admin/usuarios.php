<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--Quiero que aqui se vea brevemente la informacion de los usuarios, como una lista con la id y los otros campos como en .NET-->
    <div id="Usuarios">
        <div id="Nombre"></div>
        <div id="Contraseña"></div>
        <div id="Correo"></div>
        
    </div>

<form id="formEditarUsuario">
  <input name="nombre">
  <input name="email">
  <input name="password">
  <button type="submit">Guardar Cambios</button>
</form>
<!--Tengo que hacer que el formulario tenga la misma informacion que el div Usuarios cuando se valla a editar.-->
    
<script src="public\js\usuarios\editar.js"></script>    
<script src="public\js\usuarios\ver.js"></script>    
</body>
</html>