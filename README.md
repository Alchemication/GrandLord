# GrandLord
CIT Software Project

#### Web App for rating Landlord's performance

Application must have functionality
======================
1. Register User
2. Login
3. Search tenancy
4. Tenancy
    -  Add (with rate)
    -  Edit
    -  Delete
5. About page
6. Contact us page
7. Update profile

DB Schema
======================
```sql

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityDesc` varchar(255) NOT NULL,
  `addedAt` datetime NOT NULL,
  `addedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(30) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buildingNumber` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `county` varchar(125) NOT NULL,
  `city` varchar(125) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL,
  `active` enum('y','n') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tenancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propertyId` int(11) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `rateLandlordApproach` enum('1','2','3','4','5') NOT NULL,
  `rateQualityOfEquipment` enum('1','2','3','4','5') NOT NULL,
  `rateUtilityCharges` enum('1','2','3','4','5') NOT NULL,
  `rateBroadbandAccessibility` enum('1','2','3','4','5') NOT NULL,
  `rateNeighbours` enum('1','2','3','4','5') NOT NULL,
  `rateCarParkSpaces` enum('1','2','3','4','5') NOT NULL,
  `comment` text DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `active` enum('y','n') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propertyId_fk` (`propertyId`),
  CONSTRAINT `propertyId_fk` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` enum('tenant','landlord','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `secondName` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `active` enum('y','n') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roleId_fk` (`roleId`),
  CONSTRAINT `roleId_fk` FOREIGN KEY (`roleId`) REFERENCES `user_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `lookups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lookupType` varchar(25) NOT NULL,
  `lookupValue` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

```

Setup
======================
1. Install your LAMP/MAMP environment (make sure Apache/PHP/MySQL is working on your machine)
2. Git clone the project into your local Apache Document Root folder
3. You should be able to view the project by going to localhost/GrandLord/home/index
4. Configure your database parameters in the application/config/config.php

Generic Terms (MVC)
======================
1. Model handles all our database/business logic. Using the model we connect to our database and provide an abstraction layer. All models need to extend
AbstractModel.
2. Single Controller represents one use case and controls relation between URLs and app logic. ALl controllers need to extend
the AbstractController.
3. View represents our presentation i.e our HTML/XML/JSON code.

Project Structure
======================
* application – application specific code
* application/config – database/server configuration
* library – re-usable items (framework code)
* public – application specific js/css/images
* scripts – command-line utilities
* tmp – temporary data

Coding standards
======================
1. MySql tables will always be lowercase (with underscore as word separator) and plural e.g. items, fast_cars
2. Models will always be singular and first letter capital and "Model" appended to them. e.g. ItemModel, BestCarModel
3. Controllers will always have “Controller” appended to them. e.g. ItemsController, CarsController
4. Views will sit in the views/{controller-name}/{view-name.php}. e.g. If controller is ItemsController - then example view
could be in the views/items/list.php, where list.php is whatever you want it to be.

Database CRUD examples
======================

This assumes that you have a database created
and one table called `contacts` created like this one:

```sql
CREATE TABLE contacts
(
  id INT(11) NOT NULL AUTO_INCREMENT,
  lastName VARCHAR(30) NOT NULL,
  firstName VARCHAR(25),
  birthday DATE,
  CONSTRAINT contacts_pk PRIMARY KEY (id)
);

--- sample contacts:
insert into contacts (id, lastName, firstName, birthday) values (null, 'Napora', 'Adam', '1983-09-12 12:00:03');
insert into contacts (id, lastName, firstName, birthday) values (null, 'Jokiel', 'Greg', '1973-01-11 10:00:10');
insert into contacts (id, lastName, firstName, birthday) values (null, 'Baran', 'Piotr', '1963-03-28 09:45:12');
```

Selenium acceptance testing
===========================
Set up Selenium (Mac, Linux ... should be similar on Windows boxes)
* download selenium: http://docs.seleniumhq.org/download/
* copy jar file somewhere safe cp ~/Downloads/chromedriver /usr/local/bin
* start Selenium server:
```shell
java -jar /usr/local/bin/selenium-server* (use version downloaded)
```
* execute PHP tests from the root of projects:
```shell
php phpunit.phar -c .
```
* sample test class:
```php

<?php
class HomeControllerTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        /**
         * '*firefox' => Firefox 1 or 2
         * '*iexplore' => Internet Explorer (all)
         * '*custom /path/to/browser/binary => Other browsers (incl. Firefox on Linux)
         * '*iehta' => Experimental Embedded IE
         * '*chrome' => Experimental Firefox profile
         */
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser('*firefox');
        $this->setBrowserUrl('http://localhost/Grandlord/'); // set website being tested
    }

    public function testTitle()
    {
        $this->url('home/index'); // open the home page
        $this->assertEquals('Grandlord', $this->title());
    }

    public function testCanSeeEmptySearchTextBox()
    {
        $this->url('home/index'); // open the home page

        // find input box
        $textBox = $this->byId('search-text-box');

        // assert it's initially empty
        $this->assertEquals('', $textBox->attribute('value'));
    }
}
```

URL mapping
======================
* The way URLs work is by using a front controller pattern. Front controller is the public/index.php file and
it's role is to map the URL into controller and function. This provides nice and clean URLs and
an easy to understand/standardised structure to our application.
* For example Url: login/index means that we will write the code in the LoginController and the
method inside it called indexAction(). Inside indexAction() then we can do whatever is required to do (connect to db, show HTML
page, return XML/Json data structures or even display an error page).

Team
======================
1. Adam Napora <adam.napora@mycit.ie>
2. Gregory Jokiel <grzegorz.jokiel@mycit.ie>
3. Piotr Baran <piotr.baran@mycit.ie>

