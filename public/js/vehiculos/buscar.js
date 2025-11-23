const nombre = document.getElementById("Nombre");
const contraseña = document.getElementById("Contraseña");
const correo = document.getElementById("Correo");
//Hay que poner los campos del vehiculo en vez de los de usuario

const url = "http://localhost/miapp/api.php?controller=Vehicle&action=buscar";
try {
const response = await fetch(url);
if(!response.ok){
  throw new Error(`Response status: ${response.status}`);
}
const res = await response.json();
console.log(res);
nombre.textContent = res.Nombre;
contraseña.textContent = res.Contraseña;
correo.textContent = res.Correo;

} catch (error) {
  console.error(error.message)
}