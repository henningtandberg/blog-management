# Simple Blog Managment System
## A simple content managment system made in PHP.

### How to use:
**Set up database by running the tables_create
script located at resources/sql/ ...**
*Remeber to set desired admin username and password!*

**or up database manually by following
these steps:**

1. Create at database in MYSQL
*CREATE DATABASE <databasename>*

2. Create admin table
*CREATE TABLE admin (
    user varchar(256) primary key,
    pass varchar(256) not null
);*

3. Create user with sha256 encryption.
*INSERT INTO admin (user, pass)
    VALUES( SHA2('<username>', 256)
            SHA2('<password>', 256)
            );*

4. Create table called blog:
*CREATE TABLE blog (
    b_id    INT NOT NULL AUTO_INCREMENT,
    b_pub   BOOLEAN NOT NULL,
    b_title varchar(255) NOT NULL,
    b_post  TEXT NOT NULL,
    b_date  DATE NOT NULL,
    PRIMARY KEY(b_id)
);*

### To do:
- Fix logging for errorhandler
