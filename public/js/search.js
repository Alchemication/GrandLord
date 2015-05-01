(function($, window) {

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

                        if (response.status === 'error') {
                            // trigger standard modal error handler
                            GrandLord.flashMessage('error', response.errors);
                            return;
                        }

                        if (!response.length) {
                            $('#no-results-found').show();
                        } else {
                            $('#no-results-found').hide();
                        }

                        process(response);
                    },
                    error: function (xhr, textStatus, error) {

                        // trigger standard error handler
                        GrandLord.flashMessage('error', textStatus);
                    }
                });
            }
        });
    });

})(window.jQuery, window);
