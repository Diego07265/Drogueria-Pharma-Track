# Droguería-Pharma-Track

Sistema de gestión para droguerías que permite administrar inventario, proveedores, empleados y generar reportes.

## 📋 Descripción

Droguería-Pharma-Track es una aplicación web diseñada para facilitar la gestión y administración de droguerías. El sistema permite llevar un control detallado del inventario de medicamentos, gestionar proveedores, administrar empleados y generar reportes.

## 🚀 Características

- **Gestión de Usuarios**
  - Sistema de login seguro
  - Registro de nuevos usuarios
  - Recuperación de contraseña

- **Control de Inventario**
  - Registro de productos
  - Control de lotes
  - Seguimiento de fechas de vencimiento
  - Gestión de stock
  - Control de precios

- **Gestión de Proveedores**
# README — Estado actual del Frontend

Este repositorio contiene el frontend de una aplicación prototipo para la gestión de una droguería. El código actual es una interfaz estática (cliente-side) sin backend ni persistencia.

Resumen rápido
- Tipo: Frontend estático (SPA simple dentro de `index.html`).
- Estado: Prototipo / MVP. Funcionalidades UI implementadas pero sin persistencia ni autenticación real.

Funcionalidades implementadas (actuales)
- Interfaz de inicio de sesión y pantalla de registro (solo UI, no autentica).
- Dashboard con navegación a los módulos: Inventario, Proveedores, Empleados y Reportes.
- Inventario: tabla con productos de ejemplo y formulario para registrar nuevo producto (muestra/oculta). No persiste datos.
- Proveedores: tabla con proveedores de ejemplo y formulario para registrar proveedor (muestra/oculta). No persiste datos.
- Empleados: tabla con selección de fila; selección visual y botón para eliminar la fila seleccionada (funciona en el DOM). Formulario para crear empleados (no persiste).
- Reportes: sección placeholder para futuras implementaciones.

Arquitectura y archivos clave
- `index.html`: Contiene todas las vistas y formularios en una sola página.
- `formulario.js`: Lógica principal de navegación y comportamiento (funciones como `ocultarTodo()`, `iniciarSesion()`, `mostrarInventario()`, `mostrarProveedores()`, `mostrarEmpleados()`, `mostrarReportes()`, `mostrarFormulario()`, etc.). También maneja la selección y eliminación de filas en la tabla de empleados.
- `css/bootstrap.min.css`: Bootstrap incluido para estilos.
- `js/bootstrap.bundle.min.js`, `js/bootstrap.min.js`: Librerías de Bootstrap.
- `img/`: Recursos gráficos (logo, fondo, etc.).

Estructura mínima relevante
```
index.html
formulario.js
css/bootstrap.min.css
js/bootstrap.bundle.min.js
js/bootstrap.min.js
img/
```

Cómo ejecutar (local)
- Opción rápida: abrir `index.html` directamente en el navegador.
- Opción recomendada (servidor local) — PowerShell:
```powershell
cd 'c:\8.Proyectos'
python -m http.server 8000
# luego abrir http://localhost:8000
```
o con `http-server`:
```powershell
npx http-server -p 8000
```

Limitaciones actuales
- No hay backend ni API: toda la lógica es del lado del cliente.
- No existe persistencia: los cambios en formularios/tablas no se guardan después de recargar.
- Autenticación/seguridad: inexistente (el login solo muestra el dashboard).
- Validación de formularios mínima o inexistente.

Notas técnicas cortas
- Navegación: se controlan vistas añadiendo/removiendo la clase Bootstrap `d-none`.
- Datos: tablas están hardcodeadas dentro de `index.html`.
- Comportamientos de ejemplo: selección de fila y eliminación en la lista de empleados está implementada en `formulario.js` con confirmación `confirm()`.

