<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Grandlord</title>
    <meta name="description" content="Rate Your Landlord">
    <meta name="author" content="CIT">
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

            <div class="topNav">
                <text class="text-muted"><a href="<?php echo BASE_URL ?>/home/index"> <img alt="Grandlord" src="<?php echo BASE_URL ?>/img/logoGray.png"></a></text>
                <button type="submit" class="btn btn-success  pull-right btn-margin-left"onclick="location.href='<?php echo BASE_URL ?>/login/index'">Sign in</button>
                <button type="button" class="btn btn-default  pull-right" onclick="location.href='<?php echo BASE_URL ?>/login/index'">Register</button>

            </div>
        </div>


        <nav>
            <ul class="nav nav-justified">
                <!-- class="active" to be defined -->
                <li><a href="<?php echo BASE_URL ?>/home/index">Home</a></li>
                <li><a href="<?php echo BASE_URL ?>/search/index">Search</a></li>
                <li><a href="<?php echo BASE_URL ?>/myTenancies/index">My Tenancies</a></li>
                <li><a href="<?php echo BASE_URL ?>/about/index">About</a></li>
                <li><a href="<?php echo BASE_URL ?>/contact/index">Contact</a></li>
            </ul>
        </nav>
    </div>
