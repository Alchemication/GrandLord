<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/search.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/add-tenancy.css"/>

<div class="jumbotron">

    <div class="form-group">
        <h2>Add Tenancy</h2>
    </div>

    <form class="form-horizontal">

        <h4>Rating 1: <span class="count-stars" id="count-stars-accessibility">0</span></h4>
        <h4>Rating 2: <span class="count-stars" id="count-stars-quality">0</span></h4>
        <h4>Rating 3: <span class="count-stars" id="count-stars-clean">0</span></h4>
        <h4>Avg: <span id="count-stars-avg">0</span></h4>

        <div class="form-group">
            <label for="property" class="col-sm-2 control-label">Property</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="property" placeholder="Enter property address">
            </div>
        </div>

        <div class="form-group">
            <label for="from-to" class="col-sm-2 control-label">Time you stayed there</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="from-to" placeholder="Stayed there from/to">
            </div>
        </div>

        <div class="form-group">
            <h2>Rate Tenancy (1 poor, 5 excellent)</h2>
        </div>

        <div class="form-group">
            <label for="accessibility" class="col-sm-2 control-label">Landlord's Accessibility</label>
            <div class="col-sm-10">
                <div id="stars-accessibility" class="starrr"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="quality" class="col-sm-2 control-label">Flat Quality</label>
            <div class="col-sm-10">
                <div id="stars-quality" class="starrr"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="clean" class="col-sm-2 control-label">How Clean Place Was</label>
            <div class="col-sm-10">
                <div id="stars-clean" class="starrr"></div>
            </div>
        </div>

        <div class="form-group">
            <h2>More info</h2>
        </div>

        <div  class="form-group">
            <label for="inputQuery3" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

<script src="<?php echo BASE_URL; ?>/public/js/search.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/add-tenancy.js"></script>
