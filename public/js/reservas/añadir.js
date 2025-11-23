document.getElementById("formAñadir").addEventListener("submit",e => {e.preventDefault();})

const data ={
  nombre: e.target.nombre.value,
  email: e.target.email.value,
  password: e.target.email.value
};

fetch("http://localhost/miapp/api.php?controller=Booking&action=crear",{
  method: "POST",
  headers:{ "Content-Type": "application/json" },
  body: JSON.stringify(data)
})
.then(res => res.json())
.then(r => console.log(r));

//Pon este codigo en los demas formularios