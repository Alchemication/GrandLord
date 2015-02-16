<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/bootstrap.css" />

    <!-- Custom styles -->
    <link href="<?php echo BASE_URL ?>/public/css/justified-nav.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/public/css/stylesG.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="container">

    <div class="wrapper">
        <div class="masthead">

            <div class="row">
                <div class="col-md-10"><h1 class="text-nowrap">Project Grandlord</h1></div>
                <div class="col-md-1"><h4 class="text-muted"><a href="./index.html">Sign in</a></h4></div>
                <div class="col-md-1"><h4 class="text-muted"><a href="./index.html">Register</a></h4></div>
            </div>

            <nav>
                <ul class="nav nav-justified">
                    <li class="active"><a href="./index.html">Home</a></li>
                    <li><a href="./projects.html">Projects</a></li>
                    <li><a href="./index.html">Services</a></li>
                    <li><a href="./index.html">About</a></li>
                    <li><a href="./index.html">Contact</a></li>
                </ul>
            </nav>
        </div>

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>Grandlord stuff!</h1>
            <p class="lead">Goal of the Project</p>
            <p>	Enable tenants and any interested parties to view opinions on properties, landlords and agencies looking after properties for rent. Make interest from 3rd party integration, users donations and advertisements.</p>
            <p> PHP Part

                <?php
                echo date('l, F dS Y.');
                ?>

        </div>
        </p>
        <!-- Example row of columns -->


        <!-- Site footer -->
        <footer class="footer">
            <p>© Project Grandlord</p>
        </footer>
    </div> <!-- /wrapper -->
</div> <!-- /container -->




</body>
</html>




