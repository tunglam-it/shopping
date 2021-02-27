function actionDelete(event) {

    event.preventDefault();
    let urlRequest = $(this).data('url');//lay duong link tu ben index
    let that = $(this);//chinh la cai button minh dang click vao
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax
            ({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your record has been deleted.',
                            'success'
                        )
                    }
                },
                error: function () {

                }
            })


        }
    })
}

$(function () {
    $(document).on('click', '.action_delete', actionDelete)//khi nao click vao button co class thi thuc hien function
})

$('.checkbox_parent').on('click', function () {
    $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
});

$('.checkAll').on('click', function () {
    $(this).parents().find('.checkbox_children').prop('checked', $(this).prop('checked'));
    $(this).parents().find('.checkbox_parent').prop('checked', $(this).prop('checked'));
});
