import Swal from 'sweetalert2';

$(document).on('click', '.delete-elm', function (e) {
    e.preventDefault();
    let $this = $(this);
    Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Vous ne pourrez pas revenir en arrière !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmer'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax(
                {
                    method: 'get',
                    url: $this.attr('href'),
                    success: function (data) {
                        if (data.success) {
                            console.log('2312312')
                            toastr.success(data.msg);
                            $this.parent().parent().remove();
                        } else {
                            toastr.error(data.msg);
                        }
                    },
                }
            )
        }
    })
})

$(document).on('click', '.create-vol', function (e) {
    e.preventDefault();
    let $this = $(this);
    $.ajax({
        method: 'GET',
        url: $this.attr('href'),
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
                    function () {
                        window.location.href = "/vols";
                    }, 2000);

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


$(document).on('click', '.close-modal', function (e) {
    e.preventDefault();
    console.log('here');
    $('.modal').modal('hide');
});

$(document).on('click', '.create-hebergements', function (e) {
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

$(document).on('submit', '#hebergementModal #hebergementModalForm', function (e) {
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
                $('#hebergementModal').modal('hide');
                setTimeout(
                    function () {
                        window.location.href = "/hebergements";
                    }, 2000);

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


$(document).on('click', '.create-restaurations', function (e) {
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

$(document).on('click', '.create-volontaire', function (e) {
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


$(document).on('submit', '#volontaireModal #volontaireModalForm', function (e) {
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
                $('#volontaireModal').modal('hide');
                setTimeout(
                    function () {
                        window.location.href = "/volontaires";
                    }, 2000);

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


$(document).on('submit', '#restaurationModal #restaurationModalForm', function (e) {
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
                $('#restaurationModal').modal('hide');
                setTimeout(
                    function () {
                        window.location.href = "/restaurations";
                    }, 2000);

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




