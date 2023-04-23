# Discogram
Esta es una aplicacion web basada en la UI de Discord con la finalidad de crear entornos agradables para conversar sobre tecnologia.

## Utilidad
Esta aplicacion web es muy facil e intuitiva de usar. Te creas una cuenta, y tienes comunidades a tu disposicion.

## ¿Como funciona?
Discogram para el back-end solo utiliza php y MySQL. Los usuarios y los mensajes de los servidores se almacenan en una misma base de datos. 

## TO-DO:
    - [ ] Terminar el sistema de creacion de servidores
    - [ ] Poder ponerse una foto de perfil
    - [ ] Poder unirse a servidores
    - [X] Hacer el apartado de changelog
    - [ ] Hacer la consola de desarrolladores
    - [ ] Poder manejar todos los usuarios desde el panel (Hacerlos Admin, etc)

    - [ ] **Lanzar Discogram**

## Requerimientos
- PHP 8.1 o Superior
- MySQL

## Como desplegar
### LocalHost
- Descargue el .zip del repositorio
- El contenido pongalo en C:/xampp/htdocs
- Inicie Apache y MySQL

**phpMyAdmin**
- CREATE DATABASE discogram;
- 
- use discogram;
- 
- CREATE TABLE users (
-     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
-     username VARCHAR(50) NOT NULL UNIQUE,
-     password VARCHAR(255) NOT NULL,
-     created_at DATETIME DEFAULT CURRENT_TIMESTAMP
- );
- 
- 
- CREATE TABLE messages (
-   id INT AUTO_INCREMENT PRIMARY KEY,
-   author VARCHAR(255) NOT NULL,
-   message TEXT NOT NULL,
-   timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
- );
- 
- 
- CREATE TABLE servers (
-   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-   server_id VARCHAR(255) NOT NULL,
-   user_id VARCHAR(255) NOT NULL,
-   server_name VARCHAR(255) NOT NULL
- );
- 
- ALTER TABLE users ADD admin TINYINT;
- 
- ALTER TABLE users ADD tokens INT;
