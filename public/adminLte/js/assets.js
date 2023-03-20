$(document).on('click', '.create-vol', function (e) {
    e.preventDefault();
    var $this = $(this);
    $.ajax({
        url: $this.attr('href'),
        method: 'Get',
        date: {},
        success: function (response) {
            $(response.html).modal('show')
        }
    })
});

$(document).on('submit', '#volModal #volModalForm', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $action = $this.attr('action');

    $.ajax({
        method: 'POST',
        url: $action,
        data: $this.serialize(),
        success: function (response) {
            if (response.success) {
                toastr.success(response.msg);
                $('#volModal').modal('hide');
                setTimeout(
                    function()
                    {
                        window.location.href = "/vols";
                    }, 3000);

            } else {
                toastr.error(response.msg);
            }
        },
        error: function (response) {
            if (response.status === 422) {
                var obj = jQuery.parseJSON(response.responseText);
                $.each(obj.errors, function (index, error) {
                    toastr.error(error);
                    return;
                });
            } else {
                toastr.error('Une erreur est survenue lors du traitement de votre demande.');
            }

        }
    });
    return false;
});



