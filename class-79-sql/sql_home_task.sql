drop database if exists inventory_system;
create database inventory_system;
show databases;
use inventory_system;

drop table if exists brands;
create table brands (
id int auto_increment primary key,
name varchar(100) not null
);

insert into brands(name) 
values("Apple"), ("Samsung"), ("Techno");


drop table if exists categories;
create table categories (
id int auto_increment primary key,
name varchar(100) not null
);

insert into categories(name) 
values("Mobile"), ("Smart Watch"), ("Laptop");


drop table if exists products;
create table products (
id int auto_increment primary key,
product_name varchar(100) not null,
brand_id int,
category_id int,
price float,
is_active tinyint
);

insert into products(product_name,brand_id,category_id,price,is_active) 
values("iPhone 14",1,1,1000,1),
("Samsung Galaxy S22",2,1,800,1),
("Techno X2",3,2,600,1),
("Smart Watch 2",1,2,300,1),
("Laptop 2",1,3,2000,1),
("Smart Watch 3",2,2,400,1);


drop view if exists vw_active_products;
create view vw_active_products as
select p.id, p.product_name, b.name as brand, c.name as category, p.price
from products p, brands b, categories c
where p.brand_id = b.id and p.category_id = c.id and p.is_active = 1;

select * from vw_active_products where price > 1000;
select * from vw_active_products where category ="Mobile" and brand = "Apple";
select * from vw_active_products where category ="Mobile" and price > 500 and price < 1500;