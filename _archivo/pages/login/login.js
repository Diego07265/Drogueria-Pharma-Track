function iniciarSesion() {
    document.getElementById("login").classList.add("d-none");
    document.getElementById('dashboard').classList.remove("d-none");
}

function mostrarRegistro() {
    document.getElementById("login").classList.add("d-none");
    document.getElementById('registro').classList.remove("d-none");
}

function volverLogin() {
    document.getElementById('dashboard').classList.add('d-none');
    document.getElementById('inventario').classList.add('d-none');
    document.getElementById('proveedores').classList.add('d-none');
    document.getElementById('reportes').classList.add('d-none');
    document.getElementById('formulario').classList.add('d-none');
    document.getElementById('formularioProveedores').classList.add('d-none');
    document.getElementById('listadeEmpleados').classList.add('d-none'); 
    document.getElementById('formempleados').classList.add('d-none');
    document.getElementById('login').classList.remove('d-none');
}