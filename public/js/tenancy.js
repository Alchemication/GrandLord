(function($, window) {

    // add custom features when document is ready
    $(function () {

        var currentTenancyId,
            editedData;

        // show modal edit tenancy
        $('.btn-edit-tenancy').on('click', function (e) {

            // prevent link from being followed
            e.preventDefault();

            // refresh ratings
            editedData = $(this).data();

            _.each(editedData, function (val, key) {

                var el = $('input#' + key);

                if (el.length) {
                    el.rating('update', val);
                }
            });

            // update selected tenancy id
            $('#tenancy-id').val(editedData.id);

            // update comment
            $('#comment').val(editedData.comment);

            // update dates
            $('#dateFrom').html(editedData.dateFrom);
            $('#dateTo').html(editedData.dateTo);

            // show dialog box
            $('.edit-tenancy-wrap').modal();
        });

        // submit form with tenancy edition
        $(document).on('click', '.btn-edit-tenancy-confirm', function (e) {

            var formData = $('.edit-tenancy-form').serialize();

            e.preventDefault();

            GrandLord.flashMessage('modal-process');

            $.ajax({
                url: '../tenancy/edit',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                async: true,
                success: function (response) {

                    var rowToUpdate = $('tr#row-' + response.dataToUpdate.id),
                        editButton  = rowToUpdate.children('.btn-edit-tenancy');

                    if (response.status === 'error') {
                        // trigger standard modal error handler
                        GrandLord.flashMessage('modal-error', response.errors);
                        return;
                    }

                    // hide modal
                    $('.edit-tenancy-wrap').modal('hide');

                    // update row with new avg
                    rowToUpdate.children('td.avg').html(response.newAvg);

                    // update edit button data attributes with new values
                    _.each(response.dataToUpdate, function (val, key) {
                        editButton.data(key, val);
                    });

                    // trigger standard success handler
                    GrandLord.flashMessage('success', response.msg);
                },
                error: function (xhr, textStatus, error) {

                    // trigger standard error handler
                    GrandLord.flashMessage('modal-error', textStatus);
                }
            });
        });

        // show modal remove tenancy
        $('.btn-remove-tenancy').on('click', function (e) {

            // prevent link from being followed
            e.preventDefault();

            currentTenancyId = $(this).data('id');

            $('.remove-tenancy-wrap').modal();
        });

        // submit form with tenancy removal
        $(document).on('click', '.btn-remove-tenancy-confirm', function (e) {

            e.preventDefault();

            GrandLord.flashMessage('modal-process');

            $.ajax({
                url: '../tenancy/remove',
                type: 'POST',
                dataType: 'JSON',
                data: {id: currentTenancyId},
                async: true,
                success: function (response) {

                    if (response.status === 'error') {
                        // trigger standard modal error handler
                        GrandLord.flashMessage('modal-error', response.errors);
                        return;
                    }

                    // hide modal
                    $('.remove-tenancy-wrap').modal('hide');

                    // remove row from the UI
                    $('tr#row-' + currentTenancyId).remove();

                    // trigger standard success handler
                    GrandLord.flashMessage('success', response.msg);
                },
                error: function (xhr, textStatus, error) {

                    // trigger standard modal error handler
                    GrandLord.flashMessage('modal-error', textStatus);
                }
            });
        });

        $('#search-text-box').focus();

        // show modal add new property
        $('.not-in-list').on('click', function () {
            $('.add-new-property-wrap').modal();
        });

        // add datepicker to the from-to input box
        $('#from-to').dateRangePicker({});

        // submit form with new tenancy
        $(document).on('click', '.btn-add-tenancy', function (e) {

            e.preventDefault();

            GrandLord.flashMessage('process');

            // get data from the form
            var formData = $('.add-tenancy-form').serialize();

            $.ajax({
                url: '../tenancy/add',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                async: true,
                success: function (response) {

                    if (response.status === 'error') {
                        // trigger standard modal error handler
                        GrandLord.flashMessage('error', response.errors);
                        return;
                    }

                    // trigger standard success handler
                    GrandLord.flashMessage('success', response.msg);

                    // clear form
                    $(this).closest('form').find("input[type=text], textarea").val("");
                },
                error: function (xhr, textStatus, error) {

                    // trigger standard error handler
                    GrandLord.flashMessage('error', textStatus);
                }
            });
        });

        // submit form with new property
        $(document).on('click', '.btn-add-property', function (e) {

            e.preventDefault();

            GrandLord.flashMessage('modal-process');

            // get data from the form
            var formData = $('.add-property-form').serialize();

            $.ajax({
                url: '../property/add',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                async: true,
                success: function (response) {

                    if (response.status === 'error') {
                        // trigger standard modal error handler
                        GrandLord.flashMessage('modal-error', response.errors);
                        return;
                    }

                    $('.add-new-property-wrap').modal('hide');
                    $('#search-text-box').val(response.property);
                    $('#prop-id').val(response.id);
                    $('#from-to').focus();

                    // trigger standard success handler
                    GrandLord.flashMessage('success', response.msg);

                    // clear form
                    $(this).closest('form').find("input[type=text], textarea").val("");
                },
                error: function (xhr, textStatus, error) {

                    // trigger standard error handler
                    GrandLord.flashMessage('modal-error', textStatus);
                }
            });
        });

        // add event when search is accepted
        $('#search-text-box').on('typeahead:selected', function (event, selected) {

            var el = selected.raw,
                id = el.id;

            $('#prop-id').val(id);
        });
    });

})(window.jQuery, window);
