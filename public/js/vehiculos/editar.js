document.getElementById("formEditarVehiculo").addEventListener("submit",e => {e.preventDefault();})

const data ={
  email: e.target.email.value,
  password: e.target.email.value
};

fetch("http://localhost/miapp/api.php?controller=Vehicle&action=editar",{
  method: "POST",
  headers:{ "Content-Type": "application/json" },
  body: JSON.stringify(data)
})
.then(res => res.json())
.then(r => console.log(r));