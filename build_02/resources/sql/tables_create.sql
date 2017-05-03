/*
    Author:     Henning P. Tandberg
    Date:       18.01.17
    Website:    /adminpanel
    Database:   MySQL
*/

/*
    Create a Database and user first.
    Make sure to be inn database before
    execution of the script.
*/


/*
    Creates admin table
    Must be secured with hashfunction
*/
CREATE TABLE admin (
    user    VARCHAR(256) NOT NULL,
    pass    VARCHAR(256) NOT NULL,
    PRIMARY KEY(user)
);

/*
    Adds adminuser
    Chane username and password
*/
INSERT INTO admin (user, pass) VALUES (
    SHA2('admin', 256),
    SHA2('password', 256)
);


/*
    Creates blog table
    b_id:       Id of post is unique
    b_pub:      If publish or not
    b_title:    Title of blogpost
    b_post:     Blogpost in text
    b_date:     Date of blogpost
    b_link:     Link to blogpost
*/
CREATE TABLE blog (
    b_id    INT NOT NULL AUTO_INCREMENT,
    b_pub   BOOLEAN NOT NULL,
    b_title VARCHAR(256) NOT NULL,
    b_post  TEXT NOT NULL,
    b_date  DATE NOT NULL,
    b_link  VARCHAR(256) NOT NULL,
    PRIMARY KEY(b_id)
);
