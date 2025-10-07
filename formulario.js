  function iniciarSesion() {
            document.getElementById("login").classList.add("d-none");
            document.getElementById("dashboard").classList.remove("d-none");
        }
        function mostrarInventario() {
            document.getElementById('dashboard').classList.add('d-none');
            document.getElementById('inventario').classList.remove('d-none');
            document.getElementById('clientes').classList.add('d-none');
            document.getElementById('reportes').classList.add('d-none');
            document.ElementById('formulario').classList.add('d-none');
        }

        function mostrarClientes() {
            document.getElementById('dashboard').classList.add('d-none');
            document.getElementById('clientes').classList.remove('d-none');
            document.getElementById('inventario').classList.add('d-none');
            document.getElementById('reportes').classList.add('d-none');
            document.getElementById('formulario').classList.add('d-none');
        }

        function mostrarReportes() {
            document.getElementById('dashboard').classList.add('d-none');
            document.getElementById('reportes').classList.remove('d-none');
            document.getElementById('inventario').classList.add('d-none');
            document.getElementById('clientes').classList.add('d-none');
            document.getElementById('formulario').classList.add('d-none');
        }

        function mostrarFormulario() {
            document.getElementById('inventario').classList.add('d-none');
            document.getElementById('formulario').classList.remove('d-none');
        }