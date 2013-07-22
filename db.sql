CREATE TABLE employees(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64),
  password VARCHAR(14),
  job_title VARCHAR(50),
  company_id INT(5),
  email1 INT(5),
  email2 INT(5),
  salary VARCHAR(10),
  permission_level INT(4),
  is_permission_level_active INT(1),
  start_date VARCHAR(11)
);
CREATE TABLE permissions(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  level_name VARCHAR(20)
);
CREATE TABLE emails(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  employee_id INT (5),
  employee_email VARCHAR(64)
);
CREATE TABLE company(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128),
  phone VARCHAR(13),
  address VARCHAR(128)
);