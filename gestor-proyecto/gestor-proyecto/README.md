# Gestor de Proyectos (MVC PHP)

Pequeña plantilla MVC en PHP usando MySQL (PDO). Contiene autenticación básica, CRUD para `proyecto` y estructura MVC.

Instalación rápida:

1. Copiar `.env.example` a `.env` y ajustar las credenciales.
2. Importar `database.sql` en MySQL: `mysql -u user -p empresa < database.sql` o usar phpMyAdmin.
3. Colocar el proyecto en un servidor con `public/` como document root (por ejemplo XAMPP: `htdocs/gestor-proyecto/public`).
4. Abrir en navegador: `http://localhost/gestor-proyecto/public/` o ruta según configuración.

Credenciales de prueba: crear usuario en registro o insertar en tabla `users` (la plantilla no incluye la tabla `users` en el dump; puede crear manualmente):

SQL mínimo para `users`:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Notas:
- El sistema usa `app/` para modelos, vistas y controladores.
- El punto de entrada es `public/index.php`.
- Variables sensibles en `.env`.
