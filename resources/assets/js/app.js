require('./bootstrap');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

$('body').on('click', '.try-sweet-warningCallback', function () {
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#039BE5",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plx!",
    closeOnConfirm: false,
    closeOnCancel: false
  }, function (isConfirm) {
    if (isConfirm) {
      swal({
        title: "Deleted!",
        text: "Your imaginary file has been deleted.",
        type:"success",
        confirmButtonColor: "#039BE5"
      });
    }
    else {
      swal({
        title: "Cancelled",
        text: "Your imaginary file is safe :)",
        type: "error",
        confirmButtonColor: "#039BE5"
      });
    }
  });
});
