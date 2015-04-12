<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/tenancy.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/css/star-rating.min.css"/>

<?php $newTenancyInfo = !count($tenancies) ? 'Your first' : 'New'; ?>

<br/>
<a href="<?php echo BASE_URL ?>/tenancy/add"><i class="glyphicon glyphicon-plus-sign"></i> Add <?php echo $newTenancyInfo; ?> Tenancy</a>

<?php if (count($tenancies)): ?>

    <table class="table table-responsive table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Stayed</th>
                <th>Address</th>
                <th>Avg Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tenancies as $tenancy): ?>
                <tr id="row-<?php escape($tenancy['id']); ?>">
                    <td><?php escape($tenancy['dateFrom']) ?> to <?php escape($tenancy['dateTo']) ?></td>
                    <td><?php escape($tenancy['address']) ?></td>
                    <td class="avg"><?php escape($tenancy['avgRate']) ?></td>
                    <td>
                        <a href="" data-id="<?php escape($tenancy['id']); ?>"
                           data-date-from="<?php escape($tenancy['dateFrom']); ?>"
                           data-date-to="<?php escape($tenancy['dateTo']); ?>"
                           data-comment="<?php escape($tenancy['comment']); ?>"
                           data-rate-landlord-approach="<?php escape($tenancy['rateLandlordApproach']); ?>"
                           data-rate-quality-of-equipment="<?php escape($tenancy['rateQualityOfEquipment']); ?>"
                           data-rate-utility-charges="<?php escape($tenancy['rateUtilityCharges']); ?>"
                           data-rate-broadband-accessibility="<?php escape($tenancy['rateBroadbandAccessibility']); ?>"
                           data-rate-neighbours="<?php escape($tenancy['rateNeighbours']); ?>"
                           data-rate-car-park-spaces="<?php escape($tenancy['rateCarParkSpaces']); ?>"
                           class="btn-edit-tenancy btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="" data-id="<?php escape($tenancy['id']); ?>" class="btn-remove-tenancy btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-remove"></i> Remove</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="modal fade edit-tenancy-wrap">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal edit-tenancy-form" action="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit your stay between <span id="dateFrom">?</span> and <span id="dateTo">?</span></h4>
                    </div>
                    <div class="modal-body" style="padding-right: 55px !important;">

                        <div class="flash-modal alert alert-info not-displayed">Processing...</div>

                        <div class="form-group">

                            <label for="rateLandlordApproach" class="col-sm-2 control-label">Landlord's approach</label>
                            <div class="col-sm-2">
                                <input id="rateLandlordApproach" name="rateLandlordApproach" data-show-clear="false" data-show-caption="false"
                                       data-size="xs" class="rating" data-min="0" data-max="5" data-step="1">
                            </div>

                            <label for="rateQualityOfEquipment" class="col-sm-2 control-label">Quality of equipment</label>
                            <div class="col-sm-2">
                                <input id="rateQualityOfEquipment" name="rateQualityOfEquipment" data-show-clear="false" data-show-caption="false"
                                       data-size="xs" class="rating" data-min="0" data-max="5" data-step="1">
                            </div>

                            <label for="rateUtilityCharges" class="col-sm-2 control-label">Utility charges</label>
                            <div class="col-sm-2">
                                <input id="rateUtilityCharges" name="rateUtilityCharges" data-show-clear="false" data-show-caption="false"
                                       data-size="xs" class="rating" data-min="0" data-max="5" data-step="1">
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="rateBroadbandAccessibility" class="col-sm-2 control-label">Broadband accessibility</label>
                            <div class="col-sm-2">
                                <input id="rateBroadbandAccessibility" name="rateBroadbandAccessibility" data-show-clear="false" data-show-caption="false"
                                       data-size="xs" class="rating" data-min="0" data-max="5" data-step="1">
                            </div>

                            <label for="rateNeighbours" class="col-sm-2 control-label">Neighbours</label>
                            <div class="col-sm-2">
                                <input id="rateNeighbours" name="rateNeighbours" data-show-clear="false" data-show-caption="false"
                                       data-size="xs" class="rating" data-min="0" data-max="5" data-step="1">
                            </div>

                            <label for="rateCarParkSpaces" class="col-sm-2 control-label">CarPark spaces</label>
                            <div class="col-sm-2">
                                <input id="rateCarParkSpaces" name="rateCarParkSpaces" data-show-clear="false" data-show-caption="false"
                                       data-size="xs" class="rating" data-min="0" data-max="5" data-step="1">
                            </div>

                        </div>

                        <div  class="form-group">
                            <label for="inputQuery3" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                            </div>
                        </div>

                        <input type="hidden" id="tenancy-id" name="id"/>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-primary btn-edit-tenancy-confirm" type="submit">
                            <i class="glyphicon glyphicon-check"></i> Save
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade remove-tenancy-wrap">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal remove-tenancy-form" action="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Remove your stay</h4>
                </div>
                <div class="modal-body">

                    <div class="flash-modal alert alert-info not-displayed">Processing...</div>

                    <h4><i class="glyphicon glyphicon-warning-sign"></i> Are you sure you want to remove that stay?</h4>
                    <h5>This action will be permanent.</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-danger btn-remove-tenancy-confirm" type="submit">
                        <i class="glyphicon glyphicon-remove"></i> Remove
                    </button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <input type="text" class="form-control not-displayed" name="fromTo" id="from-to" placeholder="Time of stay">

    <script src="<?php echo BASE_URL; ?>/public/js/star-rating.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/js/moment.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/js/jquery.daterangepicker.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/js/tenancy.js"></script>

<?php endif ?>
