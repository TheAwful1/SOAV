fetch("/usuaros/", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data)
  })
  .then(res => res.json())
  .then(r => {
    if (r.ok) {
      alert("Usuario creado con éxito");
    } else {
      alert("Error: " + r.error);
    }
  });