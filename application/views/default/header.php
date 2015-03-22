<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Grandlord</title>
    <meta name="description" content="Rate Your Landlord">
    <meta name="author" content="CIT">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/bootstrap.css" />

    <!-- JS Lib -->
    <script src="<?php echo BASE_URL; ?>/public/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/js/underscore.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/js/typehead.js"></script>

    <!-- Custom styles -->
    <link href="<?php echo BASE_URL ?>/public/css/justified-nav.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/public/css/stylesG.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="container">
    <div class="wrapper">
        <div class="masthead">

            <div class="topNav">
                <text class="text-muted"><a href="<?php echo BASE_URL ?>/home/index"> <img alt="Grandlord" src="<?php echo BASE_URL ?>/img/logoGr.png"></a></text>
                <button type="submit" class="btn btn-success  pull-right btn-margin-left"onclick="location.href='<?php echo BASE_URL ?>/login/index'">Sign in</button>
                <button type="button" class="btn btn-default  pull-right" onclick="location.href='<?php echo BASE_URL ?>/login/index'">Register</button>

            </div>
        </div>

        <nav>
            <ul class="nav nav-justified">
                <!-- class="active" to be defined -->

                <li class="<?php if ($currentView === 'home/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/home/index">Home</a></li>
                <li class="<?php if ($currentView === 'search/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/search/index">Search</a></li>
                <li class="<?php if ($currentView === 'tenancy/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/tenancy/index">My Tenancies</a></li>
                <li class="<?php if ($currentView === 'about/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/about/index">About</a></li>
                <li class="<?php if ($currentView === 'contact/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/contact/index">Contact</a></li>
            </ul>
        </nav>
    </div>
