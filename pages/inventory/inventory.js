function mostrarInventario() {
    ocultarTodo();
    document.getElementById('inventario').classList.remove('d-none');
}

function mostrarFormulario() {
    ocultarTodo();
    document.getElementById('formulario').classList.remove('d-none');
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