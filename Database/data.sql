create table admins(
   SN int primary key auto_increment,
   First_Name varchar(100),
   Last_Name varchar(100),
   Email varchar(100)  unique,
   Phone varchar(100) unique,
   Pass varchar(255) unique,
   Reg_Date datetime default now()
);