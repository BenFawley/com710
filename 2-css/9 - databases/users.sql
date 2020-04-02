CREATE TABLE Users (
    id INT(10) NOT NULL PRIMARY KEY,
    first_name VARCHAR (30),
    last_name VARCHAR (30),
    age INT(3),
    email VARCHAR(30),
    street_address VARCHAR(30),
    city VARCHAR(20),
    country VARCHAR(25),
    registered TIMESTAMP(14)
);