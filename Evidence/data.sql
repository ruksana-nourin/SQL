drop table if exists manufacturer;

create table
    manufacturer (
        id int primary key auto_increment,
        name varchar(50) not null,
        address varchar(100) not null,
        contact_no varchar(50)
    );

insert into
    manufacturer (name, address, contact_no)
values
    ('HP', 'USA', '123-456-7890'),
    ('Lenevo', 'Canada', '789-980-8356'),
    ('Dell', 'UK', '987-654-3210');

drop table if exists product;

create table
    product (
        id int primary key auto_increment,
        name varchar(50) not null,
        price int (5),
        manufacturer_id int (10)
    );

insert into
    product (name, price, manufacturer_id)
values
    ('Keyboard', 700, 1),
    ('Headphone', 950, 2),
    ('Laptop', 4900, 3),
    ('Monitor', 7500, 2),
    ('Speaker', 6000, 1),
    ('PS 5', 6500, 3);
-- 2.procedure--
drop procedure if exists add_manufacturer;
delimiter //
create procedure add_manufacturer(
    p_name varchar(50),
    p_address varchar(100),
    p_contact_no varchar(50)
)  
begin
    insert into manufacturer(name, address, contact_no) 
    values(p_name, p_address, p_contact_no);
end //
delimiter ;

-- 3. trigger--
drop trigger if exists delete_mfg;
create trigger delete_mfg 
after delete on manufacturer
for each row
delete from product where manufacturer_id = old.id;

-- 4. view --
drop view if exists vw_product;
create view vw_product as
SELECT p.*, m.name as mfg 
FROM product p, manufacturer m 
WHERE p.manufacturer_id = m.id and p.price > 5000;

    