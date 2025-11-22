const url = "http://localhost/miapp/api.php?controller=User&action=listar";
try {
const response = await fetch(url);
if(!response.ok){
  throw new Error(`Response status: ${response.status}`);
}
const res = await response.json();

} catch (error) {
  console.error(error.message)
}
//Tengo que ver como voy a poner a los usuarios en el frontend