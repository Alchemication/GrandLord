<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/search.css"/>

<!-- Jumbotron -->
<div class="jumbotron" xmlns="http://www.w3.org/1999/html">

    <div id="search-wrap" class="row">
        <input id="search-text-box" class="typeahead" type="text" placeholder="Enter address ...">
    </div>

    <div class="not-found alert alert-warning not-displayed">
        Sorry, no tenancies found for this property.
    </div>

    <div class="found not-displayed">

        <div class="alert alert-success ">
            <ul>
                <li>Bulding: <span id="building-number"></span></li>
                <li>Address: <span id="street"></span></li>
                <li>County: <span id="county"></span></li>
                <li>City: <span id="city"></span></li>
                <li>Number of tenancies: <span id="tenancy-count"></span></li>
            </ul>
        </div>

        <h5>Tenancies:</h5>
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Rate</th>
            </tr>
            </thead>
            <tbody>
            <tr></tr>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 100px;">
        <h1>Project GrandLord</h1>
        <p class="lead">Web App for rating Landlord's performance</p>
        <p class="lead">Software Group Project - SOFT7009</p>
        <p class="lead">CIT 2015</p>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>/public/js/search.js"></script>
