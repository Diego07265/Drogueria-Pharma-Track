// Función para ocultar todas las secciones
function ocultarTodo() {
    const secciones = [
        'login',
        'dashboard',
        'inventario',
        'proveedores',
        'reportes',
        'formulario',
        'listadeEmpleados',
        'formempleados',
        'formularioProveedores',
        'registro'
    ];

    secciones.forEach(seccion => {
        const elemento = document.getElementById(seccion);
        if (elemento) {
            elemento.classList.add('d-none');
        }
    });
}

// Función para iniciar sesión
function iniciarSesion() {
    ocultarTodo();
    document.getElementById('dashboard').classList.remove('d-none');
}

// Función para mostrar el registro
function mostrarRegistro() {
    ocultarTodo();
    document.getElementById('registro').classList.remove('d-none');
}

// Función para mostrar el inventario
function mostrarInventario() {
    ocultarTodo();
    document.getElementById('inventario').classList.remove('d-none');
}

// Función para mostrar proveedores
function mostrarProveedores() {
    ocultarTodo();
    document.getElementById('proveedores').classList.remove('d-none');
}

// Función para mostrar empleados
function mostrarEmpleados() {
    ocultarTodo();
    document.getElementById('listadeEmpleados').classList.remove('d-none');
}

// Función para mostrar reportes
function mostrarReportes() {
    ocultarTodo();
    document.getElementById('reportes').classList.remove('d-none');
}

// Función para mostrar formulario de nuevo producto
function mostrarFormulario() {
    ocultarTodo();
    document.getElementById('formulario').classList.remove('d-none');
}

// Función para mostrar formulario de proveedores
function mostrarFormularioProveedores() {
    ocultarTodo();
    document.getElementById('formularioProveedores').classList.remove('d-none');
}

// Función para mostrar formulario de empleados
function mostrarFormularioEmpleados() {
    ocultarTodo();
    document.getElementById('formempleados').classList.remove('d-none');
}

// Función para volver al login
function volverLogin() {
    ocultarTodo();
    document.getElementById('login').classList.remove('d-none');
}

// Manejador de eventos para la tabla de empleados
document.addEventListener('DOMContentLoaded', function() {
    const lista = document.getElementById('listadeEmpleados');
    if (!lista) return;
    
    let filaSeleccionada = null;

    // Permitir seleccionar una fila al hacer clic
    lista.addEventListener('click', function(e) {
        const fila = e.target.closest('tr');
        if (!fila) return;

        // Quitar selección anterior
        if (filaSeleccionada) {
            filaSeleccionada.classList.remove('selected-row');
        }

        // Marcar nueva selección
        filaSeleccionada = fila;
        fila.classList.add('selected-row');
    });

    // Botón eliminar
    const btnEliminar = document.getElementById('btnEliminar');
    if (btnEliminar) {
        btnEliminar.addEventListener('click', function() {
            if (filaSeleccionada) {
                if (confirm('¿Deseas eliminar este empleado?')) {
                    filaSeleccionada.remove();
                    filaSeleccionada = null;
                }
            } else {
                alert('Primero selecciona un empleado de la tabla.');
            }
        });
    }
});