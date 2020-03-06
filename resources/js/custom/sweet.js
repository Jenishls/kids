function swalDel(callback){


         swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ) 
                    callback();
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            });
   

}
