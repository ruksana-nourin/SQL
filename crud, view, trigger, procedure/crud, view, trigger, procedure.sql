drop database if exists h_w_20_5;
create database if not exists hw_20_5;
show databases;
use hw_20_5;


drop table if exists positions;
create table if not exists positions(
    id INT AUTO_INCREMENT PRIMARY KEY,
    position_name VARCHAR(100)

);

insert into positions(position_name)
values("Junior Developer");

insert into positions(position_name)
values(" Mid Developer");

insert into positions(position_name)
values("Senior Developer");

select * from positions;


-- 2

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    position_id INT,
    salary float,
    hire_date DATE
);

INSERT INTO employees (name, position_id, salary, hire_date)
VALUES
('Rahim', 1, 5000.00, '2024-01-10'),
('Karim', 2, 2500.00, '2024-03-15'),
('Nusrat', 3, 2800.00, '2024-05-20');

SELECT * FROM employees;

SELECT * FROM employees
WHERE salary < 3000;

-- Update position_name using id
UPDATE positions
SET position_name = 'Full Stack Developer'
WHERE id = 2;

select * from positions;

-- Delete employee record by id
DELETE FROM employees
WHERE id = 1;

select * from employees;

-- 3

drop view if exists vw_employee_summary;
CREATE VIEW vw_employee_summary AS
SELECT 
    e.name AS employee_name,
    p.position_name,
    e.salary
FROM employees e
JOIN positions p
ON e.position_id = p.id;

-- 4
drop procedure if exists GetEmployeeByPosition;
DELIMITER $$
CREATE PROCEDURE GetEmployeeByPosition(IN p_position_name VARCHAR(100))
BEGIN
    SELECT 
        e.id,
        e.name,
        p.position_name,
        e.salary,
        e.hire_date
    FROM employees e
    JOIN positions p
    ON e.position_id = p.id
    WHERE p.position_name = p_position_name;
END $$

DELIMITER ;

CALL GetEmployeeByPosition('Senior Developer');

-- 5
drop table if exists employee_log;
CREATE TABLE employee_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    action VARCHAR(50),
    action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


DELIMITER $$

CREATE TRIGGER after_employee_insert
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    INSERT INTO employee_log (employee_id, action, action_time)
    VALUES (NEW.id, 'INSERT', CURRENT_TIMESTAMP);
END $$

DELIMITER ;

INSERT INTO employees (name, position_id, salary, hire_date)
VALUES ('Rahim', 1, 5000.00, '2024-01-10');
