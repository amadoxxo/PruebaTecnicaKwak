# CRUD de Documentos - Prueba Técnica

## Descripción

Aplicación web desarrollada en PHP que permite gestionar documentos mediante un CRUD (Crear, Leer, Actualizar y Eliminar), incluyendo autenticación básica, búsqueda y generación automática de códigos únicos por documento.

El sistema está construido bajo arquitectura **MVC** y aplicando principios **SOLID**, especialmente **SRP** e **inyección de dependencias**.

---

## Tecnologías utilizadas

- PHP 7+
- MySQL
- HTML (vista simple)
- PDO (conexión segura a base de datos)

---

## Instalación y ejecución

### 1. Clonar o copiar el proyecto

Copiar la carpeta del proyecto en el servidor local:

- XAMPP → `htdocs/`
- WAMP → `www/`

Ejemplo:

---

### 2. Crear la base de datos

Abrir phpMyAdmin o consola MySQL y ejecutar:

```sql
CREATE DATABASE crud_docs;
USE crud_docs;

CREATE TABLE PRO_PROCESO (
  PRO_ID INT AUTO_INCREMENT PRIMARY KEY,
  PRO_PREFIJO VARCHAR(20),
  PRO_NOMBRE VARCHAR(60)
);

INSERT INTO PRO_PROCESO VALUES
(1,'ING','Ingeniería'),
(2,'CAL','Calidad'),
(3,'VEN','Ventas'),
(4,'RH','Recursos Humanos'),
(5,'LOG','Logística');

CREATE TABLE TIP_TIPO_DOC (
  TIP_ID INT AUTO_INCREMENT PRIMARY KEY,
  TIP_PREFIJO VARCHAR(20),
  TIP_NOMBRE VARCHAR(60)
);

INSERT INTO TIP_TIPO_DOC VALUES
(1,'INS','Instructivo'),
(2,'MAN','Manual'),
(3,'FOR','Formato'),
(4,'POL','Política'),
(5,'PRO','Procedimiento');

CREATE TABLE DOC_DOCUMENTO (
  DOC_ID INT AUTO_INCREMENT PRIMARY KEY,
  DOC_NOMBRE VARCHAR(60),
  DOC_CODIGO VARCHAR(50),
  DOC_CONTENIDO VARCHAR(4000),
  DOC_ID_TIPO INT,
  DOC_ID_PROCESO INT
);
```

### 3. Configurar conexión a la base de datos

config/database.php

new PDO("mysql:host=localhost;dbname=crud_docs;charset=utf8", "root", "");

### 4. CREDENCIALES DE ACCESO

Usuario: admin
Contraseña: 123456
