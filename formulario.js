function iniciarSesion() {
    document.getElementById("login").classList.add("d-none");
    document.getElementById('dashboard').classList.remove("d-none");
}

function mostrarRegistro() {
    document.getElementById("login").classList.add("d-none");
    document.getElementById('registro').classList.remove("d-none");
}

function mostrarInventario() {
    document.getElementById("dashboard").classList.add("d-none");
    document.getElementById('inventario').classList.remove("d-none");
    document.getElementById('proveedores').classList.add("d-none");
    document.getElementById('reportes').classList.add("d-none");
    document.getElementById('formulario').classList.add("d-none");
}
function mostrarProveedores() {
    document.getElementById("dashboard").classList.add("d-none");
    document.getElementById('inventario').classList.add("d-none");
    document.getElementById('proveedores').classList.remove("d-none");
    document.getElementById('reportes').classList.add("d-none");
    document.getElementById('formulario').classList.add("d-none");
}
function mostrarReportes() {
    document.getElementById('dashboard').classList.add('d-none');
    document.getElementById('reportes').classList.remove('d-none');
    document.getElementById('inventario').classList.add('d-none');
    document.getElementById('proveedores').classList.add('d-none');
    document.ElementById('formulario').classList.add('d-none');
}

function mostrarFormulario() {
    document.getElementById('inventario').classList.add('d-none');
    document.getElementById('formulario').classList.remove('d-none');
}

    const lista = document.getElementById("listadeEmpleados");
    let filaSeleccionada = null;

    // Permitir seleccionar una fila al hacer clic
    lista.addEventListener("click", function (e) {
      const fila = e.target.closest("tr"); // detectar la fila
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
    document.getElementById("btnEliminar").addEventListener("click", function () {
      if (filaSeleccionada) {
        if (confirm("¿Deseas eliminar este empleado?")) {
          filaSeleccionada.remove();
          filaSeleccionada = null;
        }
      } else {
        alert("Primero selecciona un empleado de la tabla.");
      }
    });
  
   