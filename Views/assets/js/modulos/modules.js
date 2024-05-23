export function swal(icon,title,text,location){
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
      }).then(function(){
        window.location = location
      })

}


export function swalMixin(position,icon,title){
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon:icon,
        title: title,
      })
}