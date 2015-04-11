<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/search.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/add-tenancy.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/daterangepicker.css"/>

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
            <div class="col-sm-8">
                <div id="search-wrap">
                    <input id="search-text-box" class="typeahead" type="text" placeholder="Enter property address ...">
                </div>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-default btn-sm not-in-list" type="button">
                    <i class="glyphicon glyphicon-plus-sign"></i> Not in list
                </button>
            </div>
        </div>

        <div class="form-group">
            <label for="from-to" class="col-sm-2 control-label">Time you stayed there</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="from-to" placeholder="Time of stay">
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

    <div class="modal fade add-new-property-wrap">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Property</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal add-new-property-form" action="post">

                        <div class="form-group">
                            <label for="building-no" class="col-sm-2 control-label">Building number</label>
                            <div class="col-sm-10">
                                <input type="number" required class="form-control" name="buildingNumber" id="building-no" placeholder="Building number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="building-no" class="col-sm-2 control-label">Street</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="street" id="street" placeholder="Street">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="building-no" class="col-sm-2 control-label">County</label>
                            <div class="col-sm-10">
                                <select class="form-control" required="required" name="county" id="county">
                                    <option value="">Please Select</option>
                                    <?php foreach ($lookups['county'] as $lookup): ?>
                                        <option value="<?php escape($lookup) ?>"><?php escape($lookup) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="building-no" class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10">
                                <select class="form-control" required="required" name="city" id="city">
                                    <option value="">Please Select</option>
                                    <?php foreach ($lookups['city'] as $lookup): ?>
                                        <option value="<?php escape($lookup) ?>"><?php escape($lookup) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-default btn-sm btn-add-property" type="submit">
                        <i class="glyphicon glyphicon-plus-sign"></i> Add property
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>

<script src="<?php echo BASE_URL; ?>/public/js/moment.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/jquery.daterangepicker.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/search.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/add-tenancy.js"></script>
