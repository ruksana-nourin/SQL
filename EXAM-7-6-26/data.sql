drop table if exists teacher; 
create table teacher (
    id int primary key auto_increment,
    name varchar(50) ,
    qualification varchar(50) ,
    contact_no varchar(20) 
);
insert into teacher (name, qualification, contact_no) values 
('John Doe', 'MSc Computer Science', '123-456-7890'),
('Jane Smith', 'PhD Mathematics', '987-654-3210'),
('Emily Johnson', 'MA English Literature', '555-123-4567');

drop table if exists course; 
create table course (
    id int primary key auto_increment,
    course_name varchar(50) ,
    fee int(6) , 
    teacher_id int(10)

);
insert into course (course_name, fee, teacher_id) values 
('Computer Science 101', 5000, 1),
('Mathematics 201', 16000, 2),
('English Literature 301', 400, 3),
('Data Structures', 15500, 1),
('Calculus', 650, 2),
('Shakespearean Studies', 450, 3);

drop procedure if exists add_teacher;
delimiter //
create procedure add_teacher(
    p_name varchar(50),
    p_qualification varchar(50),
    p_contact_no varchar(20)
)
begin
    insert into teacher(name, qualification, contact_no) values(p_name, p_qualification, p_contact_no);
end //
delimiter ;

drop view if exists vw_course;
create view vw_course as
SELECT c.*, t.name as teacher_name 
FROM teacher t , course c 
WHERE c.teacher_id = t.id and c.fee > 15000;

drop trigger if exists delete_teacher;
create trigger delete_teacher 
after delete on teacher
for each row
delete from course where teacher_id = old.id;

