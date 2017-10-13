# Simple Blog Managment System

### How to use:
**Set up database by running the tables_create
script located at resources/sql/ ...**
*Remeber to set desired admin username and password!*

**or up database manually by following
these steps:**

    1. Place the admin folder at a desired
    location accessable by the webserver.
    Example: /var/www/html/admin/

    2. Create at database in MYSQL
    *CREATE DATABASE <databasename>*

    3. Create admin table
    *CREATE TABLE admin (
        user varchar(256) primary key,
        pass varchar(256) not null
    );*

    4. Create user with sha256 encryption.
    *INSERT INTO admin (user, pass)
        VALUES( SHA2('<username>', 256)
                SHA2('<password>', 256)
                );*

    5. Create table called blog:
    *CREATE TABLE blog (
        b_id    INT NOT NULL AUTO_INCREMENT,
        b_pub   BOOLEAN NOT NULL,
        b_title varchar(255) NOT NULL,
        b_post  TEXT NOT NULL,
        b_date  DATE NOT NULL,
        PRIMARY KEY(b_id)
    );*

    6. Edit the configuration file located at
    admin/resources/phpinclude/config.php and edit:
    define('DB_SERVER', '<HOST_NAME_OF_WEBSERVER>');
    define('DB_USERNAME', '<DATABASE_USERNAME>');
    define('DB_PASSWORD', '<DATABASE_PASSWORD>');
    define('DB_DATABASE', '<NAME_OF_DATABASE>');

### Dependencies
- Bootstrap (minimal) .js and .css
- JQuery (2.1.4 minimal or newer)
- Summernote - Super Simple WYSIWYG editor
- Webserver with PHP and MYSQL

### To do:
#### Error handler
    - Fix logging for errorhandler
#### Dashboard
    - Show statistics
#### Blog
    - Delete files when blogpost is deleted or image is removed when editing
