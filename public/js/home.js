/**
 * Created by adam on 06/04/15.
 */

(function($, window) {

    var yearsAppended = [];

    var addYearElement = function (year) {

        var link = '';

        if (_.indexOf(yearsAppended, year) === -1) {
            yearsAppended.push(year);
            link = '<li class="year">' + year + '</li>';
        }

        return link;
    };

    var addEventElement = function (tenancy) {

        console.log(tenancy);

        return '<li class="event" data-date-from="' + tenancy.dateFrom + '" data-date-to="' + tenancy.dateTo + '" data-rate-neighbours="' + tenancy.rateNeighbours + '" data-rate-car-park-spaces="' + tenancy.rateCarParkSpaces
            + '" data-rate-landlord-approach="' + tenancy.rateLandlordApproach  + '" data-rate-quality-of-equipment="' + tenancy.rateQualityOfEquipment + '" data-rate-utility-charges="'
            +   tenancy.rateUtilityCharges + '" data-rate-broadband-accessibility="' + tenancy.rateBroadbandAccessibility + '" data-comment="' + tenancy.comment +'">' +
                    '<h3>' +
                        '<input id="id_' + tenancy.id + '" name="rateUtilityCharges" data-show-clear="false" data-show-caption="false"' +
                            'data-size="xs" data-disabled="true" class="rating" data-min="0" data-max="5" data-step="1">' +
                    '</h3>' +
                    '<h4>From ' + tenancy.dateFrom + ' to ' + tenancy.dateTo + '<i class="glyphicon glyphicon-comment"></i></h4>' +
                    '<p>' + tenancy.comment + '</p>' +
                    '</li>';
    };

    var makeListElements = function (years, tenancy) {

        var html      = '',
            firstPass = true;

        _.each(years, function (year) {
            if (firstPass) {
                html += addYearElement(year);
                html += addEventElement(tenancy);

                firstPass = false;
            } else {
                html += '<li class="event"><h4>...</h4></li>';
            }
        });

        return html;
    };

    $(function () {

        $(document).on('click', '.event', function () {

            var dateFrom = $(this).data('dateFrom'),
                dateTo = $(this).data('dateTo'),
                rateNeighbours = $(this).data('rateNeighbours'),
                rateParkingV = $(this).data('rateCarParkSpaces'),
                rateLandlordApproach = $(this).data('rateLandlordApproach'),
                rateUtilityCharges = $(this).data('rateUtilityCharges'),
                rateBroadbandAccessibility = $(this).data('rateBroadbandAccessibility'),
                rateQualityOfEquipment = $(this).data('rateQualityOfEquipment'),
                comment = $(this).data('comment');

            $('#info-date-from').text(dateFrom);
            $('#info-date-to').text(dateTo);

            $('#info-rate-parking').rating('update', rateParkingV);
            $('#info-neighbours').rating('update', rateNeighbours);
            $('#info-LandlordApproach').rating('update', rateLandlordApproach);
            $('#info-QualityOfEquipment').rating('update', rateQualityOfEquipment);
            $('#info-BroadbandAccessibility').rating('update', rateBroadbandAccessibility);
            $('#info-UtilityCharges').rating('update', rateUtilityCharges);
            $('#info-comment').text(comment);

            $('.show-tenancy-detail').modal();

        });

        // focus on search automatically
        $('#search-text-box').focus();

        // add event when search is accepted
        $('#search-text-box').on('typeahead:selected', function (event, selected) {

            var el = selected.raw,
                id = el.id;

            // get tenancies for this property
            $.ajax({
                url: '../tenancy/find?id=' + id,
                type: 'GET',
                dataType: 'JSON',
                async: true,
                success: function (response) {

                    var html = '';

                    yearsAppended = [];

                    if (!response.data.length) {
                        $('#no-results-found').show();
                    } else {
                        $('#no-results-found').hide();

                        _.each(response.data, function (tenancy) {
                            var years = tenancy.yearFrom === tenancy.yearTo ? [tenancy.yearFrom] : _.range(tenancy.yearFrom, tenancy.yearTo);
                            html     += makeListElements(years, tenancy);
                        });

                        // add html to timelime
                        $('.timeline').html(html).fadeIn();

                        // trigger stars
                        $('.rating').rating('create');

                        // update star values
                        _.each(response.data, function (tenancy) {

                            var avgRate = Math.round(tenancy.avgRate),
                                elId    = 'id_' + tenancy.id;

                            $('#' + elId).rating('update', avgRate);
                        });
                    }
                },
                error: function (xhr, textStatus, error) {

                    // trigger standard error handler
                    GrandLord.flashMessage('error', textStatus);
                }
            });
        });

    });

})(window.jQuery, window);
