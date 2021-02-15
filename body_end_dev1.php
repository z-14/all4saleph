<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<script>
  function deleted(w_id){

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
       var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
    {
        swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    );
 
    ajaxpagefetcher.load('window', 'wishlist_list.php', true);
    }
     };
    xmlhttp.open("GET", "remove_to_wishlist.php?w_id=" +w_id, true);
     xmlhttp.send();
  }

  else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your WISHLIST item is safe :)',
      'error'
    )
  }
})
    }
</script>

<script> 
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>