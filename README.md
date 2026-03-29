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

**Sistema de Rutas:**
- Router basado en expresiones regulares para capturar parámetros dinámicos
- URLs limpias y RESTful (ej: `/productos/1/edit` en lugar de `?controller=producto&action=edit&id=1`)
- Soporte para rutas con parámetros variables
- Mapeo centralizado de rutas en `app/routes/web.php`

---

## 📂 Estructura principal del proyecto

pharma-track/
│
├── app/
│ ├── controllers/      # Controladores (ProductoController, CategoriaController, DashboardController, AuthController)
│ ├── models/           # Modelos (Producto, Categoria, Empleado)
│ ├── views/            # Vistas (productos, categorías, dashboard, autenticación)
│ ├── routes/           # Rutas de la aplicación (web.php)
│ ├── core/             # Clases core (Auth.php)
│ ├── config/           # Configuración interna
│ └── scripts/          # Scripts de prueba
│
├── public/
│ └── index.php         # Front controller y router principal
│
├── assets/
│ ├── css/              # Estilos (Bootstrap)
│ ├── js/               # JavaScript
│ └── img/              # Imágenes del proyecto
│
├── sql/                # Scripts de base de datos
│
└── README.md

---

## 🛣️ Sistema de Rutas

El proyecto utiliza un sistema de rutas dinámicas basado en expresiones regulares que permite URLs limpias y RESTful.

### Rutas Disponibles

**Autenticación:**
```
GET  /login              → Mostrar formulario de login
POST /login              → Procesar login
GET  /logout             → Cerrar sesión
```

**Dashboard:**
```
GET /dashboard           → Vista principal
```

**Productos:**
```
GET    /productos                    → Listar productos
GET    /productos/create             → Formulario crear producto
POST   /productos/store              → Guardar nuevo producto
GET    /productos/:id/edit           → Formulario editar producto
POST   /productos/:id/update         → Actualizar producto
GET    /productos/:id/delete         → Eliminar producto
```

**Categorías:**
```
GET    /categorias                   → Listar categorías
GET    /categorias/create            → Formulario crear categoría
POST   /categorias/store             → Guardar nueva categoría
GET    /categorias/:id/edit          → Formulario editar categoría
POST   /categorias/:id/update        → Actualizar categoría
GET    /categorias/:id/delete        → Eliminar categoría
```

**Inventario:**
```
GET /inventario          → Ver estado del inventario
```

### Ejemplo de URLs

| Acción | URL Anterior | URL Nueva |
|--------|--------------|-----------|
| Lista de productos | `?controller=producto&action=index` | `/pharma-track/public/index.php?url=/productos` |
| Crear producto | `?controller=producto&action=create` | `/pharma-track/public/index.php?url=/productos/create` |
| Editar producto 5 | `?controller=producto&action=edit&id=5` | `/pharma-track/public/index.php?url=/productos/5/edit` |
| Eliminar categoría 3 | `?controller=categoria&action=delete&id=3` | `/pharma-track/public/index.php?url=/categorias/3/delete` |

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
- Sistema de rutas dinámicas con expresiones regulares
- URLs limpias y amigables (RESTful)
- Parámetros extraídos automáticamente de la URL

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
- Sistema de rutas dinámicas RESTful

**Pendiente por implementar:**
- Módulo de proveedores
- Validaciones de seguridad avanzadas
- Sistema de reportes
- Gestión de inventario optimizada
- Tests automatizados
- Documentación de API

---

## 🚀 Cómo ejecutar el proyecto

### Requisitos
- PHP 7.4 o superior
- MySQL 5.7 o superior
- XAMPP (recomendado)
- Git

### Instalación

1. **Clonar el repositorio**
```bash
git clone <url-del-repositorio>
cd pharma-track
```

2. **Configurar la base de datos**
```bash
# Importar el archivo SQL en MySQL
mysql -u root < sql/drogueriapharmatrack.sql
```

3. **Configurar conexión a BD**
Editar `app/config/bd.php` con las credenciales de tu MySQL

4. **Acceder a la aplicación**
```
http://localhost/pharma-track/public/index.php?url=/login
```

### Credenciales por defecto
Revisar la base de datos para obtener las credenciales de prueba creadas en `sql/drogueriapharmatrack.sql`

---

✍️ Autor

Diego Ospina  
Proyecto académico – Análisis y Desarrollo de Software






