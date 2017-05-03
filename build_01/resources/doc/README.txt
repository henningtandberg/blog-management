README hennings hjemmeside:

-------------1---------------
Set up database:
1. Create a database user
    - Create user ... ??
2. Create at database in MYSQL
    - CREATE DATABASE <databasename>

3. Create admin table
    CREATE TABLE admin (
        user varchar(256) primary key,
        pass varchar(256) not null
    );

4. Create user with sha256 encryption.
    INSERT INTO admin (user, pass)
        VALUES( SHA2('<username>', 256)
                SHA2('<password>', 256)
                );

--------------------2--------------------
Set up blog table:
1. Create table called blog:
    CREATE TABLE blog (
        b_id    INT NOT NULL AUTO_INCREMENT,
        b_pub   BOOLEAN NOT NULL,
        b_title varchar(255) NOT NULL,
        b_post  TEXT NOT NULL,
        b_date  DATE NOT NULL,
        PRIMARY KEY(b_id)
    );
