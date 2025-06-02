# Laravel REST API – Backend

Este proyecto es una API RESTful construida con Laravel.

## 🚀 Requisitos

- PHP >= 8.4
- Composer
- MySQL / PostgreSQL (o cualquier base de datos compatible)
- Extensiones de PHP requeridas por Laravel
- Opcional: Laravel Sail o Docker (según cómo esté configurado el proyecto)

---

## ⚙️ Instalación

# Instalar dependencias PHP
composer install

# Generar clave de la app
php artisan key:generate

# Configurar la base de datos en el archivo .env

# Ejecutar migraciones (y seeders si tenés)
php artisan migrate
# php artisan db:seed  # <- descomentá si usás seeders

# (Opcional) Correr servidor local
php artisan serve
