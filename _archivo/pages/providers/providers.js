function mostrarProveedores() {
    ocultarTodo();
    document.getElementById('proveedores').classList.remove('d-none');
}

function mostrarFormularioProveedores() {
    ocultarTodo();
    document.getElementById('formularioProveedores').classList.remove('d-none');
}

// Función auxiliar para ocultar todas las secciones
function ocultarTodo() {
    const elementos = [
        'login', 'dashboard', 'inventario', 'proveedores', 
        'reportes', 'formulario', 'listadeEmpleados', 
        'formempleados', 'formularioProveedores'
    ];
    
    elementos.forEach(elemento => {
        document.getElementById(elemento).classList.add('d-none');
    });
}