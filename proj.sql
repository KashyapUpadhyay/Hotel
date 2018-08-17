DROP DATABASE HOTEL;
CREATE DATABASE HOTEL;
\c hotel

CREATE TABLE Customer(
	 cust_id varchar(10) not null primary key,
	 fname varchar(20) not null, 
	 lname varchar(20) not null, 
	 age integer, 
	 contact_no char(10) not null unique, 
	 email varchar(50)
 		);
 
CREATE TABLE Hotel_Branch(
	 hotel_id varchar(10) not null primary key, 
	 location varchar(30) not null,
	 hotel_name varchar(30) not null unique
 );
 
CREATE TABLE Supplier(
	supplier_id varchar(10) not null primary key, 
	prod_id varchar(10) not null unique, 
	prod_name varchar(30) not null unique
);

CREATE TABLE Facilities(
	f_id varchar(10) not null primary key, 
	f_name varchar(20) not null, 
	start_time TIME not null, 
	end_time TIME not null, 
	availability boolean
);

CREATE TABLE Department(
	dept_id varchar(10) not null primary key, 
	dept_name varchar(30) not null 
); 

CREATE TABLE Employee(
	emp_id varchar(10) not null primary key, 
	fname varchar(20) not null, 
	lname varchar(20) not null, 
	salary varchar(15) not null,
	dept_id varchar(10) not null,
	hotel_id varchar(10) not null,
	foreign key(dept_id) references Department(dept_id) on delete cascade,
	foreign key(hotel_id) references Hotel_Branch(hotel_id) on delete cascade  
	
);

alter table Employee add foreign key(hotel_id) references Hotel_Branch(hotel_id);

CREATE TABLE Dependent(
	name varchar(20) not null, 
	sex char(1) not null, 
	birth_date DATE, 
	relationship varchar(20) not null, 
	emp_id varchar(10) not null,
	primary key(name, emp_id),
	foreign key(emp_id) references Employee(emp_id) on delete cascade
);

CREATE TABLE Rooms(
	room_no varchar(10) not null primary key, 
	room_type varchar(20) not null, 
	price varchar(10) not null, 
	cust_id varchar(10) not null unique, 
	hotel_id varchar(10) not null,
	foreign key(hotel_id) references Hotel_Branch(hotel_id) on delete cascade,
	foreign key(cust_id) references Customer(cust_id) on delete cascade
);

CREATE TABLE Bill(
	bill_id varchar(10) not null primary key, 
	laundry varchar(5), 
	damages varchar(10), 
	room_service varchar(6), 
	cust_id varchar(10) not null unique,
	room_price varchar(10) not null,
	foreign key(cust_id) references Customer(cust_id) on delete cascade
);

CREATE TABLE Designated(
	cust_id varchar(10) not null, 
	emp_id varchar(10) not null, 
	primary key(cust_id,emp_id),
	foreign key(cust_id) references Customer(cust_id) on delete cascade,
	foreign key(emp_id) references Employee(emp_id) on delete cascade
);

CREATE TABLE Provides(
	f_id varchar(10) not null, 
	hotel_id varchar(10) not null,
	foreign key(f_id) references Facilities(f_id) on delete cascade,
	foreign key(hotel_id) references Hotel_Branch(hotel_id) on delete cascade
);

CREATE TABLE Supplies(
	hotel_id varchar(10) not null, 
	supplier_id varchar(10) not null, 
	quantity integer not null, 
	price varchar(10),
	foreign key(hotel_id) references Hotel_Branch(hotel_id)on delete cascade,
	foreign key(supplier_id) references Supplier(supplier_id)on delete cascade
);

CREATE TABLE Reserves(
	cust_id varchar(10) not null,
	room_no varchar(10) not null,
	primary key(cust_id,room_no),
	foreign key(room_no) references Rooms(room_no)on delete cascade,
	foreign key(cust_id) references Customer(cust_id) on delete cascade
);


insert into Customer values('C001','Jack','Walder',36,8809568999,'mail2jack@gmail.com');
insert into Customer values('C002','Noah','Jefferson',40,9902135609,'noahJefferson@ymail.com');
insert into Customer values('C003','Walter','White',50,9004207810,'walterKwhite@gmail.com');
insert into Customer values('C004','Payal','Singh',26,8095133658,'payalmrsSingh@hotmail.com');
insert into Customer values('C005','Ashwin','Raj',24,7001233571,'rajAshWin@gmail.com');
insert into Customer values('C006','Kapil','Kapoor',53,8001243536,'KKapoor@gmail.com');
insert into Customer values('C007','Chris','Walker',30,7482456913,'WalkChris@hotmail.com');
insert into Customer values('C008','Lenny','Caprio',33,8110235600,'leOCapri@ymail.com');
insert into Customer values('C009','Jennifer','Cole',29,9900124577,'coleBuisness@hotmail.com');
insert into Customer values('C010','Jonas','James',36,8788037945,'mail2JJ@gmail.com');

insert into Hotel_Branch values('H001','Bangalore','Seasons: Summer');
insert into Hotel_Branch values('H002','Chennai','Seasons: Overcast');
insert into Hotel_Branch values('H003','New York','Seasons: Winter');
insert into Hotel_Branch values('H004','Sydney','Seasons: Spring');
insert into Hotel_Branch values('H005','Delhi','Seasons: Autumn');
insert into Hotel_Branch values('H006','London','Seasons: Rain');
insert into Hotel_Branch values('H007','Amsterdam','Seasons: Fall');
insert into Hotel_Branch values('H008','Auckland','Seasons: Pure');
insert into Hotel_Branch values('H009','California','Seasons: Nature');
insert into Hotel_Branch values('H010','Chicago','Seasons: Oceans');

insert into Supplier values('S001','P001','Food');
insert into Supplier values('S002','P002','Stationary');
insert into Supplier values('S003','P003','Carpets');
insert into Supplier values('S004','P004','Utensils');
insert into Supplier values('S005','P005','Mattresses');
insert into Supplier values('S006','P006','Surveillance Equipment');
insert into Supplier values('S007','P007','Casino Material');
insert into Supplier values('S008','P008','Interior Decorations');
insert into Supplier values('S009','P009','Building Material');
insert into Supplier values('S010','P010','Beverages');

insert into Facilities values('F001','Gym','8:00 am','10:00 pm','true');
insert into Facilities values('F002','Pool','4:00 pm','8:00 pm','true');
insert into Facilities values('F003','Restaurant','6:00 am','11:00 pm','true');
insert into Facilities values('F004','Night Club','8:00 pm','2:00 am','false');
insert into Facilities values('F005','Cafe','8:00 am','9:00 pm','false');
insert into Facilities values('F006','Bar','8:00 pm','2:00 am','true');
insert into Facilities values('F007','Lounge','8:00 am','11:00 pm','false');
insert into Facilities values('F008','Internet','10:00 am' ,'10:00 am','true');
insert into Facilities values('F009','Spa','2:00 pm','10:00 pm','false');
insert into Facilities values('F010','Parking','8:00','22:00','true');

insert into Department values('D001','Security');
insert into Department values('D002','House Keeping');
insert into Department values('D003','Office');
insert into Department values('D004','Engineering');
insert into Department values('D005','Accounts');
insert into Department values('D006','Human Resources');
insert into Department values('D007','Food and Beverages');

insert into Employee values('E001','Homer','Prat',360000,'D001','H001');
insert into Employee values('E002','Sabrina','Hawkings',450000,'D004','H001');
insert into Employee values('E003','Teresa','Carpenter',170000,'D001','H001');
insert into Employee values('E004','Gregg','Hayes',560000,'D006','H003');
insert into Employee values('E005','Marlene','Welch',100000,'D005','H003');
insert into Employee values('E006','Lauren','Barber',490000,'D001','H003');
insert into Employee values('E007','Cody','Weber',360000,'D003','H003');
insert into Employee values('E008','Theodore','Maldonado',170000,'D002','H001');
insert into Employee values('E009','Phil','Cobb',560000,'D007','H001');
insert into Employee values('E010','Stephen','Taylor',100000,'D005','H001');

insert into Dependent values('Simon','M','1999-01-08','Son','E003');
insert into Dependent values('Lionel','M','1991-03-30','Son','E006');
insert into Dependent values('Nick','M','1997-07-30','Son','E007');
insert into Dependent values('Elaine','F','1980-12-22','Wife','E004');
insert into Dependent values('Lynette','F','1960-05-28','Mother','E008');
insert into Dependent values('Myra','F','1992-06-17','Daughter','E002');
insert into Dependent values('Jerald"','M','1972-09-23','Husband','E005');
insert into Dependent values('Shirley','F','1980-04-21','Wife','E009');
insert into Dependent values('Candace','F','1989-01-19','Daughter','E001');
insert into Dependent values('Jimmie','M','1969-07-1','Husband','E003');

insert into Rooms values('R001','Single','2000','C001','H003');
insert into Rooms values('R002','Double','4000','C002','H003');
insert into Rooms values('R003','Royale','5000','C003','H003');
insert into Rooms values('R004','Deluxe','7000','C004','H003');
insert into Rooms values('R005','Honeymoon Suite','10000','C005','H003');
insert into Rooms values('R006','Single','2000','C006','H001');
insert into Rooms values('R007','Double','4000','C007','H001');
insert into Rooms values('R008','Royale','5000','C008','H001');
insert into Rooms values('R009','Deluxe','7000','C009','H001');
insert into Rooms values('R010','Honeymoon Suite','10000','C010','H001');
/* add rooms */ 

insert into Bill values('B001','500','643','100','C003','10000');
insert into Bill values('B002','643','300','100','C001','8000');
insert into Bill values('B003','300','0','500','C004','14000');
insert into Bill values('B004','0','443','0','C006','8000');
insert into Bill values('B005','430','343','0','C007','10000');
insert into Bill values('B006','443','0','300','C009','5000');
insert into Bill values('B007','0','0','0','C005','8000');

insert into Designated values('C001','E003');
insert into Designated values('C001','E005');
insert into Designated values('C003','E001');
insert into Designated values('C004','E003');
insert into Designated values('C005','E007');
insert into Designated values('C001','E008');
insert into Designated values('C007','E004');
insert into Designated values('C008','E003');
insert into Designated values('C009','E009');
insert into Designated values('C010','E010');

insert into Provides values('F001','H001');
insert into Provides values('F002','H001');
insert into Provides values('F003','H003');
insert into Provides values('F004','H005');
insert into Provides values('F005','H006');
insert into Provides values('F006','H004');
insert into Provides values('F007','H005');
insert into Provides values('F008','H002');
insert into Provides values('F009','H002');
insert into Provides values('F004','H010');

insert into Supplies values('H001','S001',50,654);
insert into Supplies values('H002','S002',400,4765);
insert into Supplies values('H004','S001',100,987654);
insert into Supplies values('H006','S005',500,78549);
insert into Supplies values('H002','S008',300,65974);
insert into Supplies values('H005','S002',1000,4967);
insert into Supplies values('H007','S006',2000,8765);
insert into Supplies values('H001','S007',700,78956);
insert into Supplies values('H003','S002',450,45679);
insert into Supplies values('H001','S001',10,6788);

insert into Reserves values('C001','R001');
insert into Reserves values('C006','R006');
insert into Reserves values('C007','R007');

select Customer.fname,Customer.lname,employee.fname from employee,customer,designated where Employee.emp_id = Designated.emp_id and customer.cust_id = 'C001'and customer.cust_id = designated.cust_id;
/*select all employees designated to a customer*/

select hotel_name,location from Hotel_Branch where location like 'A%' or location like 'C%'; 
/*select hotel names based on location*/ 

select fname,salary*1.25 as IncreasedSalary from Employee where dept_id = 'D001';
/*select name and increased salary for department security*/

select dept_id, count(emp_id) as CountEmp,avg(salary) as AverageSalary from Employee group by dept_id;
/*select average salary and number of employees per department*/

select * from Facilities where availability = 'true';
/* show all available facilities */

update Customer set email = 'fightingKapil@gmail.com' where cust_id = 'C006';
/* updates email id of customer'*/

select fname,lname,age from Customer where age in (select max(age) from Customer );
/* Finding Oldest ctomer using nested queries*/

select e.fname as Emp_name,d.name as dependent_name from Dependent as d,Employee as e where e.fname in (select e.fname from Employee where salary > 40000) and e.emp_id = d.emp_id; 
/* selects employees and their dependents whose salary is less than 40000*/

select distinct room_no from Rooms, Hotel_Branch where Hotel_Branch.hotel_id in ('H003','H001');
 
/*select supplier_id from Supplies where supplier_id in(select max(quantity*price) as max_amount from Supplies);*/
/*select supplier_id,(quantity*price) as max_amount from Supplies where max_amount = max(max_amount);*/

/*select * from Employee where dept_id in (select dept_id from Employee group by dept_no having count(emp_id) = ( select max(count(emp_id)) from Employee group by dept_no));*/

select * from Supplier where supplier_id in ( select supplier_id from Supplies where quantity > 355);

/*select supplier_id from Supplier where supplier_id exists (select supplier_id from Supplies where price > 40000);*/

select emp_id,fname from Employee as E where salary > ( select AVG(salary) from Employee where dept_id = E.dept_id);

Create view dept_max as select dept_id,max(salary) as dept_max_salary from Employee group by dept_id;
select * from dept_max;

/*select * from Employee where salary = ( select max(salary) from Employee group by dept_id);*/

select fname,name from employee as E left outer join dependent as D on E.emp_id = D.emp_id;

select count(*),hotel_id,sum(quantity) from supplies group by hotel_id having sum(quantity)>500;

select emp_id,cust_id from designated where cust_id like ( select cust_id from bill where laundry like '0' and damages like '0');
/* select employee designated to customer with 0 in laundry and damages 0 */

 select s.prod_id, s.prod_name from supplier as s,supplies as p where s.supplier_id = p.supplier_id and p.quantity >100 and p.quantity < 800;

 select x.total + y.total + z.total  as total_extra_charges from ((select sum(damages) as total from Bill) as x cross join (select sum(laundry) as total from Bill) as y)cross join (select sum(room_service) as total from Bill) as z;
/*sum of values in columns to get total_extra_charges from bill*/

 select sum(quantity*price) from Supplies where hotel_id = 'H001' as total_amt_paid_by_hotel1 ;
-------------------------------------------------------------

select max(price) from rooms where price not in ((Select max(price) from rooms where price not in (select max(price) from rooms)),(select max(price) from rooms)) ;
/*select 3rd highest price for rooms*/

select Customer.fname,Customer.lname,employee.fname from employee,customer,designated where Employee.emp_id = Designated.emp_id and customer.cust_id = 'C001'and customer.cust_id = designated.cust_id;
/*select all employees designated to a customer*/

select x.total + y.total + z.total  as total_extra_charges from ((select sum(damages) as total from Bill) as x cross join (select sum(laundry) as total from Bill) as y)cross join (select sum(room_service) as total from Bill) as z;
/*sum of values in columns to get total_extra_charges from bill*/

select e.fname as Emp_name,d.name as dependent_name from Dependent as d,Employee as e where e.fname in (select e.fname from Employee where salary > 40000) and e.emp_id = d.emp_id; 
/* selects employees and their dependents whose salary is less than 40000*/

select dependent.name,employee.fname 
from dependent,employee 
where dependent.emp_id = employee.emp_id 
and CURDATE() - birth_date > 20;









