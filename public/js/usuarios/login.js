
function apiFetch(controller, action, options = {}) {

    const token = localStorage.getItem('token');

    return fetch(`/SOAV/routes/api.php?controller=${controller}&action=${action}`, {
        ...options,
        headers: {
            ...action(options.headers || {}),
            'Content-Type': 'application/json',
            ...(token && { 'Authorization': 'Bearer ' + token })
        }
    })
  }


document.getElementById('formLogin').addEventListener('submit', async (e) => {
  e.preventDefault();

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  const res = await fetch('/SOAV/routes/api.php?controller=Auth&action=login', {
      method: 'POST',
      headers: {    
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({ email, password })
  });

  const data = await res.json();

  if (data.token) {
      // 🔐 AQUÍ se guarda el JWT
      localStorage.setItem('token', data.token);

      // Redirigir a home
      window.location.href = '/SOAV/public/';
  } else {
      alert('Login fallido');
  }
});

apiFetch('Auth', 'login', {
  method: 'POST',
  body: JSON.stringify(data)
})
.then(res => res.json())
.then(r => {
  if (r.token) {
      localStorage.setItem('token', r.token);
      cargarVista('Home', 'index');
  } else {
      alert(r.error);
  }
});
