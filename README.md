# 📊 Sistema de Gestión Financiera - UDB

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=black)

Un sistema web moderno y responsivo desarrollado con **Laravel 11** para la gestión, control y balance de finanzas personales o empresariales. Este proyecto fue diseñado como parte del proceso de aprendizaje en la **Universidad Don Bosco**.

---

## 📋 Tabla de Contenidos

- [✨ Características](#-características-principales)
- [🛠️ Tecnologías](#️-tecnologías-y-entorno)
- [🚀 Instalación](#-instrucciones-de-instalación-entorno-laragon)
- [🤝 Contribuciones](#-contribuciones)
- [👤 Autor](#-autor)

---

## ✨ Características Principales

Flujo completo de gestión de datos (CRUD) con una experiencia de usuario optimizada:

- 🔒 **Seguridad y Autenticación** — Sistema de acceso protegido mediante Laravel Breeze. Incluye Login, Registro y validación de sesiones.
- 📈 **Gestión de Ingresos** — Formulario moderno para registrar entradas con validación de montos y tipos.
- 📉 **Gestión de Gastos** — Control detallado de egresos con identificación visual en tonos rojos.
- 📸 **Comprobantes Digitales** — Subida de fotos de facturas o tickets (JPG, PNG, JPEG) almacenadas de forma segura en el servidor.
- 💰 **Dashboard de Balance** — Panel principal que calcula automáticamente el saldo real (Ingresos − Gastos) con tarjetas informativas.
- 📄 **Reportes Exportables** — Generación de archivos PDF con el resumen financiero usando la librería DomPDF.
- 🎨 **UI/UX Premium** — Interfaz con efectos de *Glassmorphism*, degradados cálidos tipo "Amanecer" y botones animados con iconos de Heroicons.

---

## 🛠️ Tecnologías y Entorno

| Categoría | Tecnología |
|---|---|
| **Framework Backend** | Laravel 11 (PHP 8.2+) |
| **Frontend** | Blade Engine, Tailwind CSS, Alpine.js |
| **Base de Datos** | MySQL |
| **Entorno Local** | Laragon (Windows) |
| **Autenticación** | Laravel Breeze |
| **Generación de PDF** | DomPDF |

---

## 🚀 Instrucciones de Instalación (Entorno Laragon)

### Requisitos Previos

- [Laragon](https://laragon.org/) instalado y ejecutándose
- [Composer](https://getcomposer.org/)
- [Node.js & NPM](https://nodejs.org/)
- [Git](https://git-scm.com/)

Abre la y sigue estos pasos:

---

### Paso 1 — Clonar el repositorio

```cmd
git clone https://github.com/tu-usuario/finanzas_udb.git
cd finanzas_udb
```

### Paso 2 — Instalar dependencias del proyecto

Instala las librerías de PHP y los paquetes de Node.js:

```cmd
composer install
npm install
```

### Paso 3 — Configurar el archivo de entorno

Crea tu archivo de configuración a partir del ejemplo:

```cmd
copy .env.example .env
```

### Paso 4 — Preparar la aplicación

Genera la clave de seguridad y crea el enlace para visualizar las fotos de facturas:

```cmd
php artisan key:generate
php artisan storage:link
```

### Paso 5 — Ejecutar las migraciones

Crea las tablas en la base de datos:

```cmd
php artisan migrate
```

### Paso 6 — Ejecutar la aplicación

Gracias a Laravel 11, puedes levantar el servidor y el compilador de diseño (Vite) con un solo comando:

```cmd
composer run dev
```

✅ ¡Listo! Abre tu navegador en **[http://127.0.0.1:8000](http://127.0.0.1:8000)**, crea una cuenta y empieza a usar el sistema.

---

## 👤 Autor

- 👤 **Jonathan Alexander Alberto** — AC200739
- 👤 **Christian Geovanni Centeno** — CS241743
- 👤 **José Alexander Montoya** — MQ252529
- 👤 **Gabriel Quintanilla Rodríguez** — QR230082

---

