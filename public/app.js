
function cargarVista(controller, action){
    fetch(`/SOAV/routes/api.php?controller=${controller}&action=${action}&ajax=1`)
    .then(response => response.text())
    .then(html => {
        document.getElementById('content').innerHTML = html;
    })
    .catch(err => console.error('Error', err));
}
function logout(){
    localStorage.removeItem('token');
    document.getElementById('content').innerHTML = '';
    cargarVista('Home', 'index');
}
 
function apiFetch(controller, action, options = {}) {

    const token = localStorage.getItem('token');

    return fetch(`/SOAV/routes/api.php?controller=${controller}&action=${action}`, {
        ...options,
        headers: {
            'Content-Type': 'application/json', 
            ...(options.headers || {}),
            ...(token && { 'Authorization': 'Bearer ' + token })
        }
    });
}
//apiFetch('Home', 'index')
//    .then(res => res.text())
//    .then(html => {
//        document.getElementById('content').innerHTML = html;
//    });
//

const btnLogin = document.getElementById('btnLogin');
    if(btnLogin){
        btnLogin.addEventListener('click',()=>{
    
    cargarVista('Auth', 'ViewLogin');
    })
}

const btnRegister = document.getElementById('btnRegister');
    if(btnRegister){
        btnRegister.addEventListener('click',()=>{
    
    cargarVista('Auth', 'ViewRegister');
    })
}

const btnHome = document.getElementById('btnHome');
    if(btnHome){
        btnHome.addEventListener('click',()=>{
    
    cargarVista('Home', 'index');
    })
}



