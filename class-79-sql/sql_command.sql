create table if not exists student_logs (
    id int auto_increment primary key,
    student_id int,
    status varchar(20),
    time timestamp
);

-- TRigger
-- After insert
create trigger add_student
after insert on students
for each row 
insert into student_logs (student_id, status, time)
values (new.id, "Added", now());

insert into students (name, email)
values ("John Doe", "LZq0v@example.com");
insert into students (name, email)
values ("Mita", "mita@example.com");

insert into students (name, email)
values ("TINA", "tina@example.com");

-- After update
create trigger update_student
after update on students
for each row 
insert into student_logs (student_id, status, time)
values (old.id, "Updated", now());

update students
set name = "MINA", email = "mina@example.com"
where id = 1;

-- After delete
create trigger delete_student
after delete on students
for each row
insert into student_logs (student_id, status, time)
values (old.id, "Deleted", now());

delete from students
where id = 3;
