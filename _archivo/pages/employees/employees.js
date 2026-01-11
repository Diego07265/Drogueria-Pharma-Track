function mostrarEmpleados() {
    ocultarTodo();
    document.getElementById('listadeEmpleados').classList.remove('d-none');
}

function mostrarFormularioEmpleados() {
    ocultarTodo();
    document.getElementById('formempleados').classList.remove('d-none');
}

// Manejador de eventos para la tabla de empleados
document.addEventListener("DOMContentLoaded", function () {
    const lista = document.getElementById("listadeEmpleados");
    if (!lista) return;
    let filaSeleccionada = null;

    // Permitir seleccionar una fila al hacer clic
    lista.addEventListener("click", function (e) {
        const fila = e.target.closest("tr");
        if (!fila) return;

        // Quitar selección anterior
        if (filaSeleccionada) {
            filaSeleccionada.classList.remove("selected-row");
        }

        // Marcar nueva selección
        filaSeleccionada = fila;
        fila.classList.add("selected-row");
    });

    // Botón eliminar
    const btnEliminar = document.getElementById("btnEliminar");
    if (btnEliminar) {
        btnEliminar.addEventListener("click", function () {
            if (filaSeleccionada) {
                if (confirm("¿Deseas eliminar este empleado?")) {
                    filaSeleccionada.remove();
                    filaSeleccionada = null;
                }
            } else {
                alert("Primero selecciona un empleado de la tabla.");
            }
        });
    }
});

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