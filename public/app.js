
function cargarVista(controller, action){
    fetch(`/SOAV/routes/api.php?controller=${controller}&action=${action}&ajax=1`)
    .then(response => response.text())
    .then(html => {
        document.getElementById('content').innerHTML = html;
    })
    .catch(err => console.error('Error', err));
}
 


document.getElementById('btnLogin').addEventListener('click',()=>{
    cargarVista('Auth', 'ViewLogin');
});

document.getElementById('btnRegister').addEventListener('click', () => {
    cargarVista('Auth', 'ViewRegister');
});

document.getElementById('btnHome').addEventListener('click', () => {
    cargarVista('Home', 'index');
});


