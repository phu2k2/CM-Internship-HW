function destroyCategory(id) {
    $.confirm({
        type: 'red',
        typeAnimated: true,
        icon: 'fa fa-warning',
        closeIcon: true,
        closeIconClass: 'fa fa-close',
        content: 'Do you really want delete this?',
        title: 'Warning!',
        buttons: {
            cancel: {
                btnClass: 'btn-dark',
                function() {
                }
            },
            confirm: {
                btnClass: 'btn-danger',
                function() {
                    document.getElementById("destroy" + id).submit();
                }
            }
        }
    });
}
