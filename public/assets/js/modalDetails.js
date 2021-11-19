$('#detail_obat').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var obatNo = button.data('id')

    try {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'detailObat/' + obatNo,
            method: 'POST',
            data: JSON.stringify({
                'id': 'result idddd',
                'polis': 'result obat'
            }),
            success: function (result) {
                $('.detail-obat').html(result);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log("Status: " + textStatus);
                console.log("Error: " + errorThrown);
            }

        }
        )
    } catch (e) {
        console.log('Error : ' + e.message);
    }
})
