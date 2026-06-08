<?php
require_once("db-config.php");

// Function	Description	Example
// COUNT()
$sql = "select count(*) from students where address ='Mothijheel'";
$sql = "select count(*) as student_name from students where address ='Mothijheel';";

// Function	Description	Example
// SUM()
$sql = "select sum(score) from results;";
$sql = "select sum(score) total_score from results;";
$sql = "select sum(score) total_score from results where student_id = 1;";
$sql = "select sum(score) total_score from results where exam_type = 'Mid-1';";

// Function	Description	Example
// MAX()
$sql = "select max(score) max_score from results where exam_type = 'Mid-1';";
$sql = "select student_id, max(score) max_score 
from results 
where exam_type = 'Mid-2';";

$sql = "select r.student_id, s.full_name, max(r.score) max_score 
from results r , students s
where exam_type = 'Mid-1' and r.student_id = s.id and r.score = (
      SELECT MAX(score)
      FROM results
      WHERE exam_type = 'Mid-1');";

$sql = "select r.student_id, s.full_name, r.score
from results r , students s
where r.student_id = s.id and r.score = (
      SELECT MAX(score)
      FROM results
      WHERE exam_type = 'Mid-2');";

// Function	Description	Example
// Min()
$sql = "select m.name manufacturer, p.name product_name, min(p.price) min_price 
from product p , manufacturer m
where p.manufacturer_id = m.id;";

$sql = "select r.student_id, s.full_name, r.score
from results r , students s
where r.student_id = s.id and r.score = (
      SELECT min(score)
      FROM results
      WHERE exam_type = 'Mid-2');";

// Function	Description	Example
// avg()

$sql = "select avg(price) from product";

$sql = "select avg(score) from results where exam_type ='Mid-1'";

$sql = "select exam_type, avg(score) average_score from results group by exam_type;";

$sql = "select exam_type, avg(score) average_score from results group by exam_type order by exam_type desc;";


// Home task
// mfg_name | no_of_products with count;
$sql = "SELECT m.name,
       COUNT(*)  total_product
FROM manufacturer m, product p 
where p.manufacturer_id = m.id
GROUP BY m.id, m.name;
";

?>