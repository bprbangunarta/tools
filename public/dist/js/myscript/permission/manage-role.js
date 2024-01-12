// Update Role
$(document).on('click', '.edit-role', function () {
    var role_id = $(this).data('id');
    var role_name = $(this).data('name');
    var guard_name = $(this).data('guard_name');

    $('#edit_role_id').val(role_id);
    $('#edit_name').val(role_name);
    $('#edit_guard_name').val(guard_name);

    $('#modal-edit').modal('show');
});

$('#editRoleForm').submit(function () {
    $('#modal-edit').modal('hide');
});

// Delete Role
$(document).on('click', '.delete-role', function () {
    var role_id = $(this).data('id');

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
                url: '/permission/role/' + role_id + '/destroy',
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