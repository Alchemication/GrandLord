$(function () {
    // add autocomplete
    $('#search-wrap #search-text-box').typeahead(null, {
        displayKey: 'value',
        source: function (query, process) {
            $.ajax({
                url: '../home/search?term=' + query,
                type: 'POST',
                dataType: 'JSON',
                async: true,
                success: function (response) {

                    if (!response.length) {
                        $('#no-results-found').show();
                    } else {
                        $('#no-results-found').hide();
                    }

                    process(response);
                }
            });
        }
    });

    // focus on search automatically
    $('#search-text-box').focus();

    // add event when search is accepted
    $('#search-text-box').on('typeahead:selected', function (event, selected) {

        var el = selected.raw,
            id = el.id;

        // get tenancies for this property
        var tenancies = [
            {"dateFrom": "12-12-2009", "dateTo": "12-12-2010", "rateAvg": 2},
            {"dateFrom": "12-12-2010", "dateTo": "12-12-2011", "rateAvg": 1},
            {"dateFrom": "12-12-2011", "dateTo": "12-12-2012", "rateAvg": 1},
            {"dateFrom": "12-12-2014", "dateTo": "12-12-2015", "rateAvg": 2}
        ];

        var html = '';

        // create info for this property
        if (!tenancies.length) {
            $('.found').hide();
            $('.not-found').show();
        } else {
            $('.not-found').hide();

            // update property info
            $('#building-number').text(el.buildingNumber);
            $('#street').text(el.street);
            $('#county').text(el.county);
            $('#city').text(el.city);
            $('#tenancy-count').text(tenancies.length);

            // update tenancies info
            _.each(tenancies, function (tenancy) {
                html += '<tr>';
                    html += '<td>' + tenancy.dateFrom + '</td>';
                    html += '<td>' + tenancy.dateTo + '</td>';
                    html += '<td>' + tenancy.rateAvg + '</td>';
                html += '</tr>';
            });

            $('.found table tbody').html(html);
            $('.found').show();
        }
    });
});
