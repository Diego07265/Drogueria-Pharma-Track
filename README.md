# Pharma-Track 💊
Sistema de gestión integral para una droguería

---

## 📌 Descripción del proyecto

Pharma-Track es un proyecto desarrollado en PHP que permite gestionar productos, categorías, proveedores e inventario de una droguería. Cuenta con sistema de autenticación, CRUD completo de productos y categorías, dashboard con métricas y módulo de inventario, todo bajo una arquitectura MVC personalizada.

Este proyecto hace parte de un proceso de aprendizaje en **Análisis y Desarrollo de Software (SENA)**, enfocado en buenas prácticas, seguridad web y comprensión de la arquitectura MVC.

---

## 🧱 Arquitectura del proyecto

El proyecto sigue el patrón **MVC (Modelo–Vista–Controlador)**:

- **Modelo:** Maneja la lógica de datos y la conexión con la base de datos usando PDO.
- **Vista:** Contiene las interfaces gráficas (formularios y listados) con Bootstrap.
- **Controlador:** Gestiona la lógica entre el modelo y la vista.

### Sistema de rutas
- Router basado en expresiones regulares para capturar parámetros dinámicos
- Validación del método HTTP (GET/POST) por ruta
- URLs limpias y RESTful
- Mapeo centralizado en `app/routes/web.php`

---

## 📂 Estructura del proyecto

```
pharma-track/
│
├── app/
│   ├── controllers/        # AuthController, ProductoController, CategoriaController, DashboardController, InventarioController
│   ├── models/             # Producto, Categoria, Empleado
│   ├── views/              # Vistas por módulo (productos, categorias, dashboard, auth, inventario, layout)
│   ├── routes/             # web.php — rutas de la aplicación
│   ├── core/               # Auth.php — control de acceso
│   └── config/             # bd.php — conexión a base de datos
│
├── public/
│   └── index.php           # Front controller, router principal y BASE_URL
│
├── assets/
│   ├── css/                # Bootstrap
│   ├── js/                 # Bootstrap JS
│   └── img/                # Imágenes del proyecto
│
├── sql/
│   └── drogueriapharmatrack.sql
│
└── README.md
```

---

## 🛣️ Rutas disponibles

### Autenticación
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/login` | Mostrar formulario de login |
| POST | `/login/submit` | Procesar login |
| POST | `/logout` | Cerrar sesión |

### Dashboard
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/dashboard` | Vista principal con métricas |

### Productos
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/productos` | Listar productos |
| GET | `/productos/create` | Formulario crear producto |
| POST | `/productos/store` | Guardar nuevo producto |
| GET | `/productos/:id/edit` | Formulario editar producto |
| POST | `/productos/:id/update` | Actualizar producto |
| POST | `/productos/:id/delete` | Eliminar producto |

### Categorías
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/categorias` | Listar categorías |
| GET | `/categorias/create` | Formulario crear categoría |
| POST | `/categorias/store` | Guardar nueva categoría |
| GET | `/categorias/:id/edit` | Formulario editar categoría |
| POST | `/categorias/:id/update` | Actualizar categoría |
| POST | `/categorias/:id/delete` | Eliminar categoría |

### Inventario
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/inventario` | Ver estado del inventario con alertas de stock |

---

## 🔒 Seguridad implementada

- Operaciones de eliminación y logout protegidas con **POST** — no se pueden ejecutar desde una URL
- Validación del **método HTTP** en el router por cada ruta
- Consultas a la base de datos con **PDO y sentencias preparadas** — previene SQL injection
- Protección de rutas con `Auth::check()` en todos los controladores
- Uso de `htmlspecialchars()` en todas las vistas — previene XSS
- Mensajes de error amigables al usuario sin exponer detalles internos

---

## ⚙️ Funcionalidades

### Autenticación
- Login con usuario y contraseña
- Verificación de contraseña con `password_verify()`
- Control de sesiones
- Cierre de sesión seguro (POST)

### Productos
- Listar, crear, editar y eliminar productos
- Campos: nombre, categoría, precio, stock, fecha de vencimiento, proveedor, requiere receta
- Categorías y proveedores cargados dinámicamente desde la BD

### Categorías
- Listar, crear, editar y eliminar categorías
- Protección al eliminar: mensaje amigable si la categoría tiene productos asignados

### Dashboard
- Total de productos registrados
- Total de categorías
- Contador de productos con stock bajo

### Inventario
- Listado de productos con estado de stock
- Alerta visual para productos con stock crítico (≤ 5 unidades)

---

## 🛠️ Tecnologías utilizadas

- PHP 8+ con PDO
- MySQL
- HTML5 / CSS3
- Bootstrap 5
- JavaScript
- XAMPP (entorno local)
- Git / GitHub

---

## 🗄️ Base de datos

El archivo SQL se encuentra en `/sql/drogueriapharmatrack.sql`.

Incluye las tablas: `producto`, `categoria`, `empleado`, `proveedor`.

---

## 🚀 Cómo ejecutar el proyecto

### Requisitos
- PHP 8.0 o superior
- MySQL 5.7 o superior
- XAMPP
- Git

### Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/Diego07265/Drogueria-Pharma-Track.git
cd pharma-track
```

2. Importar la base de datos en phpMyAdmin o por consola:
```bash
mysql -u root < sql/drogueriapharmatrack.sql
```

3. Verificar la conexión en `app/config/bd.php`:
```php
$host = '127.0.0.1';
$nombreBD = 'drogueriapharmatrack';
$user = 'root';
$pass = ''; // vacío en XAMPP por defecto
```

4. Acceder a la aplicación:
```
http://localhost/pharma-track/public/index.php?url=/login
```

---

## 🚧 Pendiente por implementar

- Módulo completo de proveedores
- Protección CSRF en formularios
- Sistema de reportes
- Gestión de roles y permisos
- Tests automatizados

---

## ✍️ Autor

**Diego Ospina**  
Proyecto académico — Análisis y Desarrollo de Software (SENA)
