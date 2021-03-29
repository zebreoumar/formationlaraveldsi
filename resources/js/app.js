require('./bootstrap');
import Swal from  'sweetalert2'

window.deleteConfirm=function(formId){
    Swal.fire({
        title: 'voulez vous vraiment supprimer?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `ok`,
        denyButtonText: 'Annuler',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        //   Swal.fire('Saved!', '', 'success')
        console.log(formId);
        document.getElementById(formId).submit();
        }

        else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      });
}

