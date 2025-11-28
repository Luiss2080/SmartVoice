# Guía de Instalación

Sigue estos pasos para instalar el proyecto en tu entorno local:

## 1. Clonar el Repositorio

Abre tu terminal y ejecuta el siguiente comando para descargar el código fuente:

```bash
git clone <URL_DEL_REPOSITORIO>
cd SmartVoice
```

## 2. Instalar Dependencias de PHP

Ejecuta Composer para instalar las librerías necesarias del backend:

```bash
composer install
```

## 3. Configurar el Entorno

Duplica el archivo de ejemplo de configuración y renómbralo:

```bash
cp .env.example .env
```

Abre el archivo `.env` y configura tus credenciales de base de datos:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartvoice
DB_USERNAME=root
DB_PASSWORD=
```

## 4. Generar Clave de Aplicación

Genera la clave única para tu instancia de la aplicación:

```bash
php artisan key:generate
```

## 5. Instalar Dependencias de Frontend

Instala las librerías necesarias para la interfaz de usuario:

```bash
npm install
```
