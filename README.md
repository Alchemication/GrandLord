# GrandLord
CIT Software Project

#### Web App for rating Landlord's performance

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

# Retrieve row(s) from controller using model's `find()` method

* arguments -> find(array $bindParams = [], $where = '', $fields = '*')
* returns -> dataset in the array format

```php
try {
    // instantiate model
    $contactModel = new ContactModel();

    // retrieve all contacts from db
    $allContacts = $contactModel->find();

    // load view and pass data into it
    $this->loadView('contact/display', ['contacts' => $allContacts]);

} catch (\Exception $e) {

    // on any exception - apply global error handler,
    // and display default error page
    $this->handleError($e);
}
```

# Insert row from controller using model's `insert()` method

* arguments -> insert(array $bindParams)
* returns -> dataset in the array format

```php
try {
    // instantiate model
    $contactModel = new ContactModel();

    // insert a new contact (Tim)
    $contactModel->insert([':firstName' => 'Tim', ':lastName' => 'Cook', ':birthday' => '1960-01-01 10:00:00']);

} catch (\Exception $e) {

    // on any exception - apply global error handler,
    // and display default error page
    $this->handleError($e);
}
```

# Update row(s) from controller using model's `update()` method

* arguments -> update($fields, array $bindParams = [], $where = '')
* returns -> number of updated rows

```php
try {
    // instantiate model
    $contactModel = new ContactModel();

    // update all records with firstName = Adam to Chris
    $contactModel->update(
        ['firstName'  => ':firstName'],
        [':firstName' => 'Chris'], 
        "firstName = 'Adam'"
    );

} catch (\Exception $e) {

    // on any exception - apply global error handler,
    // and display default error page
    $this->handleError($e);
}
```

# Delete row(s) from controller using model's `delete()` method

* arguments -> delete(array $bindParams = [], $where = '')
* returns -> number of deleted rows

```php
try {
    // instantiate model
    $contactModel = new ContactModel();

    // delete all rows with id not null and name starting with Ad
    $noOfRowsDeleted = $myModel->delete([':name' => 'Ad%'], 'id NOT NULL AND firstName LIKE :name');

} catch (\Exception $e) {

    // on any exception - apply global error handler,
    // and display default error page
    $this->handleError($e);
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

