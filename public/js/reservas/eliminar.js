document.getElementById("formEditarUsuario").addEventListener("submit",e => {e.preventDefault();})

const data ={
  id: e.target.id.value,
};

fetch("http://localhost/miapp/api.php?controller=User&action=eliminar",{
  method: "POST",
  headers:{ "Content-Type": "application/json" },
  body: JSON.stringify(data)
})
.then(res => res.json())
.then(r => console.log(r));