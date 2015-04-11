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

                        if (!response.length) {
                            $('#no-results-found').show();
                        } else {
                            $('#no-results-found').hide();
                        }

                        process(response);
                    },
                    error: function (response) {

                        console.log('Error:');
                        console.log(response);
                    }
                });
            }
        });
    });

})(window.jQuery, window);
