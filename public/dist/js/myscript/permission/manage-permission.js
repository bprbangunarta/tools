// Update Permission
$(document).on('click', '.edit-permission', function () {
    var permission_id = $(this).data('id');
    var permission_name = $(this).data('name');
    var guard_name = $(this).data('guard_name');
    var modul_id = $(this).data('modul_id');

    $('#edit_permission_id').val(permission_id);
    $('#edit_name').val(permission_name);
    $('#edit_guard_name').val(guard_name);
    $('#edit_modul_id').val(modul_id);

    $('#modal-edit').modal('show');
});

$('#editPermissionForm').submit(function () {
    $('#modal-edit').modal('hide');
});

// Delete Permission
$(document).on('click', '.delete-permission', function () {
    var permission_id = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/permission/' + permission_id + '/destroy',
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted successfully!',
                        showConfirmButton: false,
                        timer: 1500

                    }).then((result) => {
                        location.reload();
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.message,
                        showConfirmButton: true,
                        confirmButtonColor: "#DD4B39",
                        confirmButtonText: 'Close',
                    });
                }
            });
        }
    });
});

// Select2
$('.modul').select2()