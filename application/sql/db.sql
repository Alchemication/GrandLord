/**
 * Created by: Grzegorz Jokiel
 * Date: 19/02/15
 * Time: 22:20
 */
CREATE  database grandlord;
/**

 FOREIGN KEY (roleId) REFERENCES user_roles(id), - in user table
*/

CREATE TABLE user_roles
( id INT(11) NOT NULL AUTO_INCREMENT,
  CONSTRAINT user_roles_pk PRIMARY KEY (id),
  name ENUM('tenant', 'landlord', 'admin')
);

insert into user_roles (id, name) values (null, 'tenant');
insert into user_roles (id, name) values (null, 'landlord');
insert into user_roles (id, name) values (null, 'admin');


CREATE TABLE users
( id INT(11) NOT NULL AUTO_INCREMENT,
  CONSTRAINT user_pk PRIMARY KEY (id),
  roleId INT (11),
  CONSTRAINT roleId_fk FOREIGN KEY (roleId) REFERENCES user_roles(id),
  username VARCHAR(255),
  password VARCHAR(512),
  email   VARCHAR(255),
  firstName VARCHAR (255),
  secondName VARCHAR (255),
  createdAt DATETIME,
  updatedAt DATETIME,
  active ENUM('y', 'n')
);

insert into users (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '1', 'gjokiel', 'gjokiel123', 'gjok@mycit.ie','Greg', 'Jokiel', '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');
insert into users (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '1', 'anapora', 'anapora123', 'anap@mycit.ie','Adam', 'Napora', '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');
insert into users (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '1', 'pbaran', 'pbaranl123', 'pbar@mycit.ie','Piotr', 'Baran', '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');
insert into users (id, roleId, username, password, email, firstName, secondName, createdAt, updatedAt, active ) values (null, '3', 'admin', 'adminl123', 'admin@mycit.ie','Admin', null, '2015-02-19 23:59:59', '2015-02-19 23:59:59', 'y');

CREATE TABLE properties
( id INT(11) NOT NULL AUTO_INCREMENT,
  CONSTRAINT property_pk PRIMARY KEY (id),
  buildingNumber INT (11),
  street VARCHAR (255),
  county VARCHAR (125),
  city VARCHAR (125),
  addedBy INT (11),
  addedAt DATETIME,
  active ENUM('y', 'n')
);

CREATE TABLE tenancies
( id INT(11) NOT NULL AUTO_INCREMENT,
  CONSTRAINT tenancy_pk PRIMARY KEY (id),
  propertyId INT (11),
  CONSTRAINT propertyId_fk FOREIGN KEY (propertyId) REFERENCES properties(id),
  dateFrom DATE,
  dateTo DATE,
  rateContactWithLandlord ENUM('1', '2', '3', '4', '5'),
  rateFlatQuality ENUM('1', '2', '3', '4', '5'),
  rateCleanliness ENUM('1', '2', '3', '4', '5'),
  ratePropertyState  ENUM('1', '2', '3', '4', '5'),
  rateOverallSatisfaction ENUM('1', '2', '3', '4', '5'),
  rateAvg DECIMAL,
  comment TEXT,
  addedBy INT (11),
  addedAt DATETIME,
  updatedAt DATETIME,
  active ENUM('y', 'n')
);

CREATE TABLE activities
( id INT(11) NOT NULL AUTO_INCREMENT,
  CONSTRAINT activity_pk PRIMARY KEY (id),
  activityDesc VARCHAR (255),
  addedAt DATETIME,
  addedBy INT(11)
 );


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

