use round_70a;

drop table if exists manufacturers;
create table manufacturers (
    id int not null primary key auto_increment,
    name varchar(100) ,
    address varchar(255)

);

drop table if exists products;
create table products (
    id int not null primary key auto_increment,
    name varchar(100) ,
    manufacturer_id int,
    price float

);

insert into manufacturers(name, address) values("HP", "USA");
insert into manufacturers(name, address) values("Dell", "UK");

insert into products(name, manufacturer_id, price) values("Mouse",1, 800);
insert into products(name, manufacturer_id, price) values("Monitor",1, 1000);
insert into products(name, manufacturer_id, price) values("Monitor",2, 9900);
insert into products(name, manufacturer_id, price) values("Speaker",2, 5500);


drop procedure if exists createManufacturer;
delimiter //
create procedure createManufacturer(pname varchar(100), paddress varchar(255))
begin 
insert into manufacturers(name, address) values(pname, paddress);
end //
    


delimiter ;

drop view if exists vw_products_list;
create view vw_products_list as
select p.id, p.name, p.price, m.name mfg 
from products p , manufacturers m 
where p.manufacturer_id = m.id and p.price > 5000;

drop trigger if exists delete_mfg;
create trigger delete_mfg
before delete on manufacturers
for each row
delete from products where manufacturer_id = old.id;