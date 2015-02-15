create database grandlord;

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
