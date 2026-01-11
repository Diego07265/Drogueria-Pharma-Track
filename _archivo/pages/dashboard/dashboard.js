function mostrarDashboard() {
    ocultarTodo();
    document.getElementById('dashboard').classList.remove('d-none');
}

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