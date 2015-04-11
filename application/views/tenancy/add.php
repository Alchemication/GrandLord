<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/add-tenancy.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/daterangepicker.css"/>

<div class="jumbotron">

    <div class="form-group">
        <h2>Add Tenancy</h2>
    </div>

    <form class="form-horizontal add-tenancy-form">

        <div class="form-group">
            <label for="property" class="col-sm-2 control-label">Property</label>
            <div id="search-wrap">
                <div class="col-sm-8">
                    <input id="search-text-box" class="form-control typeahead" type="text" placeholder="Enter property address ...">
                </div>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-default btn-sm not-in-list" type="button">
                    <i class="glyphicon glyphicon-plus-sign"></i> Not in list
                </button>
            </div>
            <input type="hidden" name="propertyId" id="prop-id"/>
        </div>

        <div class="form-group">
            <label for="from-to" class="col-sm-2 control-label">Time you stayed there</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fromTo" id="from-to" placeholder="Time of stay">
            </div>
        </div>

        <div class="form-group">

            <label for="quality" class="col-sm-2 control-label">Landlord's approach</label>
            <div class="col-sm-2">
                <div id="stars-landlord" class="starrr"></div>
            </div>
            <input type="hidden" id="stars-landlord-value" name="rateLandlordApproach"/>

            <label for="quality" class="col-sm-2 control-label">Quality of equipment</label>
            <div class="col-sm-2">
                <div id="stars-quality" class="starrr"></div>
            </div>
            <input type="hidden" id="stars-quality-value" name="rateQualityOfEquipment"/>

            <label for="accessibility" class="col-sm-2 control-label">Utility charges</label>
            <div class="col-sm-2">
                <div id="stars-utility" class="starrr"></div>
            </div>
            <input type="hidden" id="stars-utility-value" name="rateUtilityCharges"/>
        </div>

        <div class="form-group">

            <label for="clean" class="col-sm-2 control-label">Broadband accessibility</label>
            <div class="col-sm-2">
                <div id="stars-broadband" class="starrr"></div>
            </div>
            <input type="hidden" id="stars-broadband-value" name="rateBroadbandAccessibility"/>

            <label for="clean" class="col-sm-2 control-label">Neighbours</label>
            <div class="col-sm-2">
                <div id="stars-neighbours" class="starrr"></div>
            </div>
            <input type="hidden" id="stars-neighbours-value" name="rateNeighbours"/>

            <label for="quality" class="col-sm-2 control-label">Carpark spaces</label>
            <div class="col-sm-2">
                <div id="stars-carpark" class="starrr"></div>
            </div>
            <input type="hidden" id="stars-carpark-value" name="rateCarParkSpaces"/>

        </div>

        <div  class="form-group">
            <label for="inputQuery3" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="comment" rows="3"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-add-tenancy">Submit</button>
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
                    <form class="form-horizontal add-property-form" action="post">

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
                    <button class="btn btn-success btn-add-property" type="submit">
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
