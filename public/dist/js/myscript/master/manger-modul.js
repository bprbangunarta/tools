// Update Modul
$(document).on('click', '.edit-modul', function () {
    var modul_id = $(this).data('id');
    var modul_name = $(this).data('name');

    $('#edit_modul_id').val(modul_id);
    $('#edit_name').val(modul_name);

    $('#modal-edit').modal('show');
});

$('#editForm').submit(function () {
    $('#modal-edit').modal('hide');
});