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
    <script src="<?php echo BASE_URL; ?>/public/js/doppler.js"></script>

    <!-- Custom styles -->
    <link href="<?php echo BASE_URL ?>/public/css/justified-nav.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/public/css/stylesG.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL ?>/public/css/global.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="container">
    <div class="wrapper rel">

        <div class="abs flash alert not-displayed"></div>

        <div class="masthead">

            <div class="topNav">
                <text class="text-muted"><a href="<?php echo BASE_URL ?>/home/index"> <img alt="Grandlord" src="<?php echo BASE_URL ?>/img/logoGr.png"></a></text>
                <?php if (!isset($_SESSION['user_name'])): ?>
                    <button type="submit" class="btn btn-success  pull-right btn-margin-left" onclick="location.href='<?php echo BASE_URL ?>/login/index'">Sign in</button>
                    <button type="button" class="btn btn-default  pull-right" onclick="location.href='<?php echo BASE_URL ?>/register/index'">Register</button>
                <?php else: ?>
                    <button type="button" class="btn btn-default  pull-right btn-margin-left" onclick="location.href='<?php echo BASE_URL ?>/login/logout'">Log out</button>
                    <span class="pull-right "> Hello <?php echo $_SESSION['first_name']; ?> &nbsp;</span>
                <?php endif ?>
            </div>
        </div>

        <nav>
            <ul class="nav nav-justified">
                <li class="<?php if ($currentView === 'home/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/home/index">Home</a></li>
                <li class="<?php if ($currentView === 'tenancy/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/tenancy/index">My Tenancies</a></li>
                <li class="<?php if ($currentView === 'about/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/about/index">About</a></li>
                <li class="<?php if ($currentView === 'contact/index') { echo 'active'; } ?>"><a href="<?php echo BASE_URL ?>/contact/index">Contact</a></li>
            </ul>
        </nav>
    </div>
