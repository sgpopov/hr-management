$('body').on('click', '.js-delete-user', function () {
  swal({
    title: 'Are you sure?',
    text: 'You will not be able to recover this user!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#039BE5',
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel plx!',
    closeOnConfirm: false,
    closeOnCancel: false
  }, function (isConfirm) {
    if (isConfirm) {
      swal({
        title: 'Deleted!',
        text: 'Your imaginary file has been deleted.',
        type:'success',
        confirmButtonColor: '#039BE5',
        timer: 2000
      });
    } else {
      swal({
        title: 'Cancelled',
        text: 'Your imaginary file is safe :)',
        type: 'error',
        confirmButtonColor: '#039BE5',
        timer: 1500
      });
    }
  });
});
