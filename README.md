DROGUERÍA PHARMA TRACK

Sistema web para la gestión de una droguería, desarrollado como proyecto académico, que evolucionó de un prototipo frontend a una aplicación funcional con backend en PHP y base de datos MySQL.

📋 Descripción

Pharma Track permite administrar el inventario de productos farmacéuticos mediante un dashboard dinámico y un CRUD de productos, facilitando el control de stock, fechas de vencimiento y productos que requieren receta médica.

El proyecto está desarrollado con PHP, MySQL, HTML, CSS y Bootstrap 5, y se ejecuta en entorno local con XAMPP.

🚀 Funcionalidades actuales
🔐 Acceso al sistema

Pantalla de inicio (login visual)

Redirección al dashboard

Opción de regresar al login desde el dashboard

⚠️ Nota: el login actual es visual (sin autenticación real), implementado para fines académicos.

📊 Dashboard

Total de productos registrados

Productos con stock bajo

Productos que requieren receta médica

Productos próximos a vencer (30 días)

Accesos rápidos a los módulos

📦 Gestión de productos (CRUD)

Listar productos

Crear producto

Editar producto

Eliminar producto

Conexión a base de datos usando PDO

🛠️ Tecnologías utilizadas

PHP 8+

MySQL

Bootstrap 5

HTML5 / CSS3

XAMPP

📂 Estructura del proyecto
pharma-track/
│── config/
│   └── bd.php
│── public/
│   ├── producto.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│── css/
│── js/
│── img/
│── index.php
│── dashboard.php
│── README.md
▶️ Cómo ejecutar el proyecto

Instalar XAMPP

Clonar este repositorio dentro de:

C:/xampp/htdocs/

Iniciar Apache y MySQL desde XAMPP

Importar la base de datos en phpMyAdmin

Acceder desde el navegador:

http://localhost:8080/pharma-track/
🎓 Estado del proyecto

✔ Dashboard dinámico ✔ CRUD funcional con base de datos ✔ Navegación entre login, dashboard y módulos ✔ Listo para entrega académica

✍️ Autor

Diego Ospina
Proyecto académico – Desarrollo de software






