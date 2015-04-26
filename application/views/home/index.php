<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/star-rating.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/search.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/tl.css"/>

<!-- Jumbotron -->
<div class="jumbotron" xmlns="http://www.w3.org/1999/html">

    <div id="search-wrap" class="row">
        <input id="search-text-box" class="typeahead" type="text" placeholder="Enter property address ...">
    </div>

    <h4 id="no-results-found" class="not-displayed">
        No results found.
    </h4>

    <div class="container">

        <div class="row">

            <!-- Timeline will go in here -->
            <ul class="timeline not-displayed">
            </ul>

        </div>
    </div>

</div>


<div class="modal fade show-tenancy-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal show-tenancy-detail-form" action="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tenancy stay form   <text id="info-date-from"></text> to <text id="info-date-to"></text></h4>
                </div>
                <div class="modal-body" style="padding-right: 55px !important;">



                    <div class="form-group">

                        <label for="info-LandlordApproach" class="col-sm-2 control-label">Landlord's approach</label>
                        <div class="col-sm-2">
                            <input id="info-LandlordApproach" name="info-LandlordApproach" data-show-clear="false" data-show-caption="false"
                                   data-size="xs" data-disabled="true" class="rating" data-min="0" data-max="5" data-step="1">
                        </div>

                        <label for="info-QualityOfEquipment" class="col-sm-2 control-label">Quality of equipment</label>
                        <div class="col-sm-2">
                            <input id="info-QualityOfEquipment" name="info-QualityOfEquipment" data-show-clear="false" data-show-caption="false"
                                   data-size="xs" data-disabled="true" class="rating" data-min="0" data-max="5" data-step="1">
                        </div>

                        <label for="info-UtilityCharges" class="col-sm-2 control-label">Utility charges</label>
                        <div class="col-sm-2">
                            <input id="info-UtilityCharges" name="info-UtilityCharges" data-show-clear="false" data-show-caption="false"
                                   data-size="xs" data-disabled="true" class="rating" data-min="0" data-max="5" data-step="1">
                        </div>

                    </div>

                    <div class="form-group">


                        <label for="info-BroadbandAccessibility" class="col-sm-2 control-label">Broadband accessibility</label>
                        <div class="col-sm-2">
                            <input id="info-BroadbandAccessibility" name="info-BroadbandAccessibility" data-show-clear="false" data-show-caption="false"
                                   data-size="xs" data-disabled="true" class="rating" data-min="0" data-max="5" data-step="1">
                        </div>

                        <label for="info-neighbours" class="col-sm-2 control-label">Neighbours</label>
                        <div class="col-sm-2">
                            <input id="info-neighbours" name="info-neighbours" data-show-clear="false" data-show-caption="false"
                                   data-size="xs" data-disabled="true" data-disabled="true" class="rating" data-min="0" data-max="5" data-step="1">
                        </div>

                        <label for="info-rate-parking" class="col-sm-2 control-label">CarPark spaces</label>
                        <div class="col-sm-2">
                            <input id="info-rate-parking" name="info-rate-parking" data-show-clear="false" data-show-caption="false"
                                   data-size="xs" data-disabled="true" data-disabled="true" class="rating" data-min="0" data-max="5" data-step="1">
                        </div>

                    </div>

                    <blockquote class="col-sm-12" id="info-comment">
                    </blockquote>

                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo BASE_URL; ?>/public/js/star-rating.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/search.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/home.js"></script>
