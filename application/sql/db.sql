/**
 * Created by: Grzegorz Jokiel
 * Date: 19/02/15
 * Time: 22:20
 */
create database grandlord;
/**

 FOREIGN KEY (roleId) REFERENCES user_roles(id), - in user table
*/

CREATE TABLE user_roles
( id INT(11) NOT NULL AUTO_INCREMENT,
  CONSTRAINT user_roles_pk PRIMARY KEY (id),
  roleId INT (11),
  name ENUM('tenant', 'landlord', 'admin')
);

insert into user_roles (id, roleId, name) values (null, '1', 'tenant');
insert into user_roles (id, roleId, name) values (null, '2', 'landlord');
insert into user_roles (id, roleId, name) values (null, '3', 'admin');


CREATE TABLE user
( id INT(11) NOT NULL AUTO_INCREMENT,
  CONSTRAINT user_pk PRIMARY KEY (id),
  roleId INT (11),
  FOREIGN KEY (roleId) REFERENCES user_roles(id),
  username VARCHAR(255),
  password VARCHAR(512),
  email   VARCHAR(255),
  firstName VARCHAR (255),
  secondName VARCHAR (255),
  createdAt DATETIME,
  updatedAt DATETIME,
  active ENUM('y', 'n')
);

insert into user (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '1', 'gjokiel', 'gjokiel123', 'gjok@mycit.ie','Greg', 'Jokiel', '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');
insert into user (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '1', 'anapora', 'anapora123', 'anap@mycit.ie','Adam', 'Napora', '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');
insert into user (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '1', 'pbaran', 'pbaranl123', 'pbar@mycit.ie','Piotr', 'Baran', '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');
insert into user (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '3', 'admin', 'adminl123', 'admin@mycit.ie','Admin', null, '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');


CREATE TABLE contacts
( id INT(11) NOT NULL AUTO_INCREMENT,
  lastName VARCHAR(30) NOT NULL,
  firstName VARCHAR(25),
  birthday DATE,
  CONSTRAINT contacts_pk PRIMARY KEY (id)
);

insert into contacts (id, lastName, firstName, birthday) values (null, 'Napora', 'Adam', '1983-09-12 12:00:03');
insert into contacts (id, lastName, firstName, birthday) values (null, 'Jokiel', 'Greg', '1973-01-11 10:00:10');
insert into contacts (id, lastName, firstName, birthday) values (null, 'Baran', 'Piotr', '1963-03-28 09:45:12');

