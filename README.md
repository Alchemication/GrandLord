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
1. Model handles all our database/business logic. Using the model we connect to our database and provide an abstraction layer.
2. Single Controller represents one use case and controls relation between URLs and app logic
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
1. mySQL tables will always be lowercase (with underscore as word separator) and plural e.g. items, fast_cars
2. Models will always be singular and first letter capital and "Model" appended to them. e.g. ItemModel, BestCarModel
3. Controllers will always have “Controller” appended to them. e.g. ItemsController, CarsController
4. Views will sit in the views/{controller-name}/{view-name.php}. e.g. If controller is ItemsController - then example view
could be in the views/items/list.php, where list.php is whatever you want it to be.

URL mapping
======================
* The way URLs work is by using a front controller pattern. Front controller is the public/index.php file and
it's role is to map the URL into controller and function. This provides nice and clean URLs and 
an easy to understand/standardised structure to our application. 
* For example Url: login/index means that we will write the code in the LoginController and the 
method inside it called indexAction(). indexAction() we can do whatever is required to do (connect to db, show HTML
page, return XML/Json data structures or even display an error page).

Team
======================
1. Adam Napora <adam.napora@mycit.ie>
2. Gregory Jokiel <grzegorz.jokiel@mycit.ie>
3. Piotr Baran <piotr.baran@mycit.ie>
4. Jennifer Flynn <jennifer.flynn@mycit.ie>
