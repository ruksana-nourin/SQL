delimiter $$
CREATE PROCEDURE IF NOT EXISTS show_products()
BEGIN
    SELECT * FROM vw_active_products;
    SELECT * FROM products;
END $$
delimiter ;

call show_products();

show procedure status where db = 'inventory_system';
drop procedure if exists show_products;



delimiter //
CREATE PROCEDURE create_product(
    
    p_name varchar(100),
    p_brand_id int,
    p_category_id int,
    p_price float,
    p_is_active tinyint
)
BEGIN
    INSERT INTO products(product_name, brand_id, category_id, price, is_active)
    VALUES(p_name, p_brand_id, p_category_id, p_price, p_is_active);
END //
delimiter ;

call create_product("I",1,3,1200,1);

