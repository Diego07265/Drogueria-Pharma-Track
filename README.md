Pharma-Track 💊  
Sistema básico de gestión para una droguería

📌 Descripción del proyecto

Pharma-Track es un proyecto desarrollado en PHP que permite gestionar productos de una droguería.  
Actualmente cuenta con un *CRUD de productos* (crear, listar, editar y eliminar), aplicando una estructura basada en el *patrón MVC (Modelo–Vista–Controlador)*.

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
│ ├── controllers/ # Controladores (ProductoController)
│ ├── models/ # Modelos (Producto)
│ ├── views/ # Vistas (CRUD de productos)
│ ├── config/ # Configuración interna
│
├── public/
│ ├── index.php # Front controller
│
├── config/
│ └── bd.php # Conexión a la base de datos
│
├── css/ # Estilos (Bootstrap)
├── js/ # JavaScript
├── img/ # Imágenes del proyecto
├── sql/ # Script de la base de datos
│
└── README.md

Durante el desarrollo se migraron archivos antiguos.  
Algunos archivos legacy se conservaron solo como referencia.

---

## ⚙️ Funcionalidades actuales
- Listar productos
- Crear productos
- Editar productos
- Eliminar productos
- Validaciones básicas de formularios
- Interfaz con Bootstrap

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
El archivo SQL se encuentra en la carpeta:

/sql/drogueriapharmatrack.sql

Incluye la estructura necesaria para la tabla de productos.

---

## 🚀 Estado del proyecto
🔧 En desarrollo  
Pendiente por implementar:
- Categorías
- Proveedores
- Validaciones avanzadas
- Mejoras de seguridad
- 
✍️ Autor

Diego Ospina
Proyecto académico – Desarrollo de software






