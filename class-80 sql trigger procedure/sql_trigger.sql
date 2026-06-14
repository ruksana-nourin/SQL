-- TRIGGERS
          --Basic syntax

-- CREATE TRIGGER trigger_name
-- AFTER INSERT/UPDATE/DELETE
-- ON table_name
-- FOR EACH ROW
-- BEGIN
--    -- SQL statements
-- END;



drop trigger if exists remove_products;
create trigger remove_products
after delete on brands
for each row
delete from products where brand_id = old.id;

delete from brands
where id = 2;


drop trigger if exists remove_products_categories_inactive;
create trigger remove_products_categories_inactive
after delete on categories
for each row
update  products set is_active = 0 where category_id = old.id;

delete from categories
where id = 1;