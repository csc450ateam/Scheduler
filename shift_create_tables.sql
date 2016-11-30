-- 
-- Author: Christian M. Adams, Chase Parker, Rachel Jackson
-- Program Name: shift_create_tables.sql
-- Purpose: Drops and creates the MySQL tables in the database
-- 			to be used in employee forms, shift preferences, etc.  
-- Description & Functionality: the InnoDB engine was used in order to support 
-- 			strict Foreign Key Constraints.  
-- 

 
drop table if exists s_shifts;
drop table if exists s_preferences;
drop table if exists s_works;
drop table if exists s_schedule;
drop table if exists s_business;
drop table if exists s_dayoff;
drop table if exists s_employee;
drop table if exists s_login_employee;
drop table if exists s_clock_record;
drop table if exists s_timeclock;



create table s_login_employee
  (firstName      varchar(25),
   lastName       varchar(25),
   emailAddr      varchar(25) not null,
   pw             varchar(255) not null,
   manager   	  boolean,
   PRIMARY KEY (emailAddr)
  ) ENGINE=INNODB;
  
  create table s_employee
	(e_id		int not null AUTO_INCREMENT,
	 fname		varchar(25) not null,
	 lname		varchar(25) not null,
	 address	varchar(35),
	 city		varchar(20),
	 state		varchar(20),
	 zip		numeric(5,0),
	 phone		numeric(10),
	 email		varchar(40),
	 manager 	boolean,
	 primary key (e_id)
	) ENGINE=INNODB;
	ALTER TABLE employee AUTO_INCREMENT=10000;


create table s_timeclock
	(e_id		int,
	clockedIn	boolean,
	PRIMARY KEY (e_id),
	FOREIGN KEY (e_id) references s_employee(e_id)
	) ENGINE = INNODB;


create table s_clock_record
	(e_id		int,
	clockIn		datetime,
	clockOut	datetime,
	PRIMARY KEY (e_id),
	FOREIGN KEY (e_id) references s_employee(e_id)
	) ENGINE = INNODB;

create table s_shifts
  (shift_id     numeric(5,0) not null,
    sh_day       	varchar(15) not null,
    sh_start  	int,
    sh_end	  	int,
    primary key (shift_id)
  ) ENGINE=INNODB;
  
  
create table s_business
	(b_id  		int not null,
	b_name		varchar(15),
	address		varchar(15),
	city		varchar(15),
	state		varchar(10),
	primary key (b_id)
	) ENGINE = INNODB;
	
/*This schedule is the current master schedule for a given company*/	
create table s_schedule
  (sch_id      	int not null,
  	b_id		int not null,
    weeks		int,
    primary key (sch_id),
    foreign key (b_id) references business(b_id)
  ) ENGINE = INNODB;
	
create table s_works
  (e_id				int not null,
  	sch_id			int not null,
  	start_shift		decimal(5,2),
  	end_shift		decimal(5,2),
  	primary key (e_id, sch_id)
  	) ENGINE = INNODB;
	
/*
--USES EMPLOYEE AS A PRIMARY ENTITY, PREFERENCES AND DAYSOFF ARE WEAK ENTITIES
*/
create table s_preferences
   (e_id 	int not null,
	su_In	numeric(3,1),
	su_Out	numeric(3,1),
	mo_In	numeric(3,1),
	mo_Out	numeric(3,1),
	tu_In	numeric(3,1),
	tu_Out	numeric(3,1),
	we_In	numeric(3,1),
	we_Out	numeric(3,1),
	th_In	numeric(3,1),
	th_Out	numeric(3,1),
	fr_In	numeric(3,1),
	fr_Out	numeric(3,1),
	sa_In	numeric(3,1),
	sa_Out	numeric(3,1),
	PRIMARY KEY (e_id, su_In),
	Foreign Key (e_id) REFERENCES employee(e_id)
	) ENGINE = INNODB;
	
create table s_dayoff
	(e_id 		int not null,
	date_off	DATE not null,
	primary key (e_id, date_off)
	) ENGINE = INNODB;
	
	
	
	
	
/*
Make a view of Schedule called worker_schedule that shows the schedule for that individual worker


-- --What if someone has 2 sets of hours they can work?
-- 
-- --Make days Table
-- --Complete Preference Table
-- 
-- --Make Announcement Table
-- --Make User/Password Table
-- 
-- 
-- --make sure to use prepared statements
-- 
-- --does it make sense to put the preferences in the same table as employee?
-- 
-- 
-- -- create table pref
-- --   (p_id       numeric(5,0) not null,
-- --     e_id      numeric(5,0) not null,
-- --     day       varchar(15),
-- --     max_hours
-- --     
-- --     primary key (p_id)
-- --     foreign key (e_id)
-- --   ) ENGINE=INNODB;
--   
-- --create table days


Just in case we need it, here is the old schedule (before it was broken into 2 tables)

create table schedule
  (sch_id      	int not null,
    e_id      	int not null,
    work_date 	date,
    start_hour  decimal(5,2),
    end_hour    decimal(5,2),
    is_holiday  boolean,
    is_weekend  boolean,
    primary key (sh_id)
    foreign key (e_id)
  ) ENGINE = INNODB;

*/