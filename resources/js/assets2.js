import Swal from 'sweetalert2';
$(document).on('click','.delete-participant',function (e) {
    e.preventDefault();
    let $this=$(this);
    Swal.fire({
        title: 'Êtes-vous sûr?',
        text:"Vous ne pourrez pas revenir en arrière !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmer'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax(
            {
                method:'get',
                url:$this.attr('href'),
                success: function (data) {
                    if (data.success) {
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
