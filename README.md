# Discogram
Esta es una aplicacion web basada en la UI de Discord con la finalidad de crear entornos agradables para conversar sobre tecnologia.

## Utilidad
Esta aplicacion web es muy facil e intuitiva de usar. Te creas una cuenta, y tienes comunidades a tu disposicion.

## ¿Como funciona?
Discogram para el back-end solo utiliza php y MySQL. Los usuarios y los mensajes de los servidores se almacenan en una misma base de datos. 

## TO-DO:
    - [ ] Terminar el sistema de creacion de servidores
    - [X] Poder ponerse una foto de perfil
    - [ ] Poder unirse a servidores
    - [X] Hacer el apartado de changelog
    - [ ] Hacer la consola de desarrolladores
    - [ ] Poder manejar todos los usuarios desde el panel (Hacerlos Admin, etc)

    - [ ] **Lanzar Discogram**

## Changelog:
```
v1.2.0 Beta

[+] 
```

## Requerimientos
- PHP 8.1 o Superior
- MySQL

## Como desplegar
### LocalHost
- Descargue el .zip del repositorio
- El contenido pongalo en C:/xampp/htdocs
- Inicie Apache y MySQL

**phpMyAdmin**
- Ejecute el siguiente MySQL Query dentro de phpMyAdmin
```sql
CREATE DATABASE discogram;

USE discogram;

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    profile_picture MEDIUMBLOB NOT NULL,
    admin TINYINT NOT NULL, -- Corregido "TINIYINT" a "TINYINT"
    status VARCHAR(255) NOT NULL -- Eliminado la coma después de la última columna
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE servers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    server_id VARCHAR(255) NOT NULL,
    user_id VARCHAR(255) NOT NULL,
    server_name VARCHAR(255) NOT NULL
);


```

**config.php (./assets/php/config.php)**

```php
define('servername', 'localhost');
define('username', 'root');
define('password', ''); // De tener una contraseña para el usuario pongala aqui
define('dbname', 'discogram');
 
$conn = mysqli_connect(servername, username, password, dbname);
 
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
```

- Reinicie Apache y MySQl desde XamPP
