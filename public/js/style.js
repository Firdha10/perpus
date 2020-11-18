function deleteFile(event, id, name) {
    event.preventDefault();
    action = name + '/' + id;
    Swal.fire({
        title: 'Hapus?',
        text: "Data tidak dapat kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: action,
                dataType: 'JSON',
                success: function (response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data Terhapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('.card').load(document.URL + ' .card-body');
                },
                error: function (xhr) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Gagal Menghapus Data',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
            return false;
        }
    })
}