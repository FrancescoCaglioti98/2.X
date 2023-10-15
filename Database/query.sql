CREATE DATABASE my_db;

USE my_db;
CREATE TABLE users(
    id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    email varchar(255) UNIQUE NOT NULL,
    full_name varchar(255) NOT NULL,
    is_active boolean DEFAULT 0 NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    KEY `is_active` (`is_active`)
);

INSERT INTO users( email, full_name, is_active )
    VALUES
        ('john@doe.com', 'John Doe', 1),
        ('jane@doe.com', 'Jane Doe', 1);


CREATE TABLE invoices(
    id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    amount decimal(10, 4),
    user_id int UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id) 
        ON DELETE SET NULL
        ON UPDATE CASCADE 
);

INSERT INTO invoices (amount, user_id)
    VALUES
        (25,1),
        (115.95,1),
        (10500,1);

SELECT  invoices.id, 
        invoices.amount,
        users.full_name
FROM    invoices
INNER JOIN  users 
    ON users.id = invoices.user_id;