drop table if exists manufacturer;
create table manufacturer(
    id int auto_increment primary key,
    name varchar(50) not null,
    address varchar(100) ,
    contact_no varchar(50)
);

drop table if exists product;
create table product(
    id int auto_increment primary key,
    name varchar(50), 
    price int(5),
    manufacturer_id int(10)
);

-- 2.--
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

call add_manufacturer('Samsung', 'South Korea', '123-456-7890');
-- 3.--

drop trigger if exists after_delete_product;
create trigger after_delete_product
after delete on product
for each row
delete from product where id = old.id;

-- 4.--
drop view if exists vw_product;
create view vw_product as
select * from product where price > 5000;

insert into manufacturer(name, address, contact_no) 
values('Apple', 'USA', '987-654-3210'),
      ('Sony', 'Japan', '555-555-5555'),
      ('LG', 'South Korea', '111-222-3333'),
      ('Microsoft', 'USA', '444-444-4444');

insert into product(name, price, manufacturer_id)
values('Galaxy S21', 8000, 1),
      ('iPhone 12', 10000, 2),
      ('PlayStation 5', 3000, 3),
      ('Surface Pro 7', 4500, 4);
