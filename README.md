# 🏆 Club Deportivo Elemental - One Wound One Victory | Landing Page para Gimnasio

[![UAX](https://img.shields.io/badge/UAX-Universidad%20Alfonso%20X%20el%20Sabio-blue)](https://www.uax.com)
[![DAW](https://img.shields.io/badge/1º%20DAW-Desarrollo%20Aplicaciones%20Web-green)](https://www.uax.com)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php)](https://www.php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql)](https://www.mysql.com)
[![Mención](https://img.shields.io/badge/🏆%20Mención%20Especial-Universidad-gold)](https://www.uax.com)

> **Proyecto Intermodular de 1º de DAW** desarrollado en la Universidad Alfonso X el Sabio (UAX), galardonado con **Mención Especial** por parte de la universidad.

## 📋 Descripción del Proyecto

Este proyecto es una landing page profesional y funcional diseñada para la promoción de un gimnasio. El proyecto incluye un formulario de inscripción completamente operativo con almacenamiento en base de datos, panel de administración para visualizar inscritos, y diseño responsive optimizado para conversiones.

Este proyecto demuestra la integración de tecnologías front-end y back-end, aplicando buenas prácticas de desarrollo web y gestión de bases de datos.

## ✨ Características Principales

- **🎨 Diseño Responsive**: Adaptable a móviles, tablets y escritorio (Mobile First)
- **📝 Formulario de Inscripción**: Captura de datos con validación PHP y JavaScript
- **🗄️ Base de Datos MySQL**: Almacenamiento persistente de inscritos
- **📊 Panel de Administración**: Visualización de lista de inscritos (`lista_inscritos.php`)
- **🔒 Seguridad**: Prevención de SQL Injection y validación de datos
- **⚡ Optimización**: Código limpio y estructurado siguiendo estándares PSR

## 🛠️ Tecnologías Utilizadas

| Capa | Tecnologías |
|------|-------------|
| **Front-end** | HTML5, CSS3, JavaScript |
| **Back-end** | PHP 8.x |
| **Base de Datos** | MySQL (gestionado con phpMyAdmin) |
| **Entorno de Desarrollo** | Visual Studio Code |
| **Servidor Local** | XAMPP |

## 📁 Estructura del Proyecto

proyecto_intermodular
├── 📂 config/
│ ├── 📄 gimnasio.sql # Script de creación de base de datos
│ └── 📄 db.php # Configuración de conexión a BD
├── 📂 public/
│ ├── 📄 index.php # Página principal (Landing)
│ ├── 📄 procesar_formulario.php # Lógica de registro
│ └── 📄 lista_inscritos.php # Panel admin - Ver inscritos
├── 📂 assets/
│ ├── 📂 css/
│ │ └── 📄 estilos.css # Estilos personalizados
│ ├── 📂 img/ # Imágenes del gimnasio
│ └── 📂 js/
│ └── 📄 scripts.js # Interactividad y validaciones
└── 📄 README.md

## 🚀 Instalación y Configuración

### Requisitos Previos
- XAMPP, WAMP o MAMP instalado
- Navegador web moderno
- Visual Studio Code (recomendado)

### Pasos de Instalación

1. **Clona el repositorio** en tu carpeta `htdocs` (XAMPP):
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/tu-usuario/proyecto_intermodular.git

2. **Configura la Base de Datos:**
- Abre phpMyAdmin (http://localhost/phpmyadmin)
- Crea una nueva base de datos llamada **gimnasio**
- Importa el archivo **config/gimnasio.sql**

3. **Configura la conexión:**
- Abre **config/db.php**
- Verifica los datos de conexión:
  $host = 'localhost';
  $user = 'root';
  $password = '';  // Tu contraseña de MySQL
  $database = 'gimnasio';

4. **Accede al proyecto:**
http://localhost/proyecto_intermodular/public/

5. **Panel de administración:**
http://localhost/proyecto_intermodular/public/lista_inscritos.php

### 🗄️ Esquema de Base de Datos
La base de datos gimnasio incluye:

- Tabla inscritos: Almacena nombre, email, teléfono, fecha de registro, etc.
- Índices optimizados para búsquedas
- Validación de datos únicos (email)
