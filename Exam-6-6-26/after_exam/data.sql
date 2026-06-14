drop table if exists manufacturer;

create table
    manufacturer (
        id int auto_increment primary key,
        name varchar(50),
        address varchar(100),
        contact_no varchar(50)
    );

drop table if exists product;

create table
    product (
        id int auto_increment primary key,
        name varchar(50),
        price int (5),
        manufacturer_id int (10)
    );

insert into
    manufacturer (name, address, contact_no)
values
    ('HP', 'USA', '123-456-7890'),
    ('Dell', 'UK', '987-654-3210');

insert into
    product (name, price, manufacturer_id)
values
    ('Mouse', 500, 1),
    ('Mouse', 450, 2),
    ('Monitor', 7500, 2),
    ('Speaker', 6000, 1);


drop procedure if exists add_manufacturer;
delimiter //
create procedure add_manufacturer(
    p_name varchar(50),
    p_address varchar(100),
    p_contact_no varchar(50)
)  
begin
    insert into manufacturer(name, address, contact_no) values(p_name, p_address, p_contact_no);
end //
delimiter ;

drop view if exists vw_product;
create view vw_product as
SELECT p.*, m.name as mfg 
FROM product p, manufacturer m 
WHERE p.manufacturer_id = m.id and p.price > 5000;

drop trigger if exists delete_mfg;
create trigger delete_mfg 
after delete on manufacturer
for each row
delete from product where manufacturer_id = old.id;