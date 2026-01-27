Pharma-Track 💊  
Sistema de gestión integral para una droguería

📌 Descripción del proyecto

Pharma-Track es un proyecto desarrollado en PHP que permite gestionar productos, categorías y empleados de una droguería.  
Actualmente cuenta con múltiples módulos incluyendo *CRUD de productos*, *CRUD de categorías*, *sistema de autenticación* y *dashboard*, aplicando una estructura basada en el *patrón MVC (Modelo–Vista–Controlador)*.

Este proyecto hace parte de un proceso de aprendizaje en **Análisis y Desarrollo de Software**, enfocado en buenas prácticas, orden del código y comprensión de la arquitectura.

---

🧱 Arquitectura del proyecto
El proyecto está organizado siguiendo el patrón *MVC*, lo que permite separar responsabilidades y facilitar el mantenimiento.

- *Modelo (Model):** Maneja la lógica de datos y la conexión con la base de datos.
- **Vista (View):** Contiene las interfaces gráficas (formularios y listados).
- **Controlador (Controller):** Gestiona la lógica entre el modelo y la vista.

---

## 📂 Estructura principal del proyecto

pharma-track/
│
├── app/
│ ├── controllers/      # Controladores (ProductoController, CategoriaController, DashboardController, AuthController)
│ ├── models/           # Modelos (Producto, Categoria, Empleado)
│ ├── views/            # Vistas (productos, categorías, dashboard, autenticación)
│ ├── core/             # Clases core (Auth.php)
│ ├── config/           # Configuración interna
│ └── scripts/          # Scripts de prueba
│
├── public/
│ └── index.php         # Front controller
│
├── assets/
│ ├── css/              # Estilos (Bootstrap)
│ ├── js/               # JavaScript
│ └── img/              # Imágenes del proyecto
│
├── sql/                # Scripts de base de datos
├── _archivo/           # Archivos legacy (referencia)
│
└── README.md

Durante el desarrollo se migraron archivos antiguos.  
Algunos archivos legacy se conservaron solo como referencia.

---

## ⚙️ Funcionalidades actuales
**Módulo de Autenticación:**
- Login de usuarios
- Gestión de sesiones
- Control de acceso

**Módulo de Productos:**
- Listar productos
- Crear productos
- Editar productos
- Eliminar productos

**Módulo de Categorías:**
- Listar categorías
- Crear categorías
- Editar categorías
- Eliminar categorías

**Módulo de Dashboard:**
- Vista general del sistema
- Datos consolidados

**Características generales:**
- Validaciones de formularios
- Interfaz responsive con Bootstrap
- Estructura MVC bien organizada
- Separación clara de responsabilidades

---

## 🛠️ Tecnologías utilizadas
- PHP (programación estructurada y MVC)
- MySQL
- HTML5
- CSS3
- Bootstrap
- JavaScript
- XAMPP (entorno local)

---

## 🗄️ Base de datos
El archivo SQL se encuentra en:

/sql/drogueriapharmatrack.sql

Incluye las tablas para productos, categorías y empleados.

---

## 🚀 Estado del proyecto
✅ En desarrollo activo

**Implementado:**
- Autenticación de usuarios
- CRUD de productos
- CRUD de categorías
- Dashboard
- Gestión de empleados

**Pendiente por implementar:**
- Módulo de proveedores
- Validaciones de seguridad avanzadas
- Sistema de reportes
- Gestión de inventario optimizada
- Tests automatizados

---

✍️ Autor

Diego Ospina  
Proyecto académico – Análisis y Desarrollo de Software






