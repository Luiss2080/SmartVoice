# Levantar el Proyecto

Una vez instalado el proyecto, sigue estos pasos para ponerlo en marcha:

## 1. Migrar y Sembrar la Base de Datos

Crea las tablas en la base de datos e inserta los datos de prueba iniciales:

```bash
php artisan migrate --seed
```

> **Nota**: Asegúrate de que tu servidor de base de datos (MySQL) esté corriendo antes de ejecutar este comando.

## 2. Compilar Assets (Frontend)

Para desarrollo, ejecuta el servidor de Vite para compilar los estilos y scripts en tiempo real:

```bash
npm run dev
```

## 3. Iniciar Servidor Local (Backend)

En una nueva terminal, inicia el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

El proyecto estará disponible en: `http://127.0.0.1:8000`

## Acceso Inicial

Si has ejecutado los seeders, puedes probar con las credenciales por defecto (si aplican) o registrar un nuevo usuario en la pantalla de inicio.
