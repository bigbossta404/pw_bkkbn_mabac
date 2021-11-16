
$(document).ready(function() {
    $(this).on('click','.btntambah',function(){
        var nama = $('#nama').val();
        var jangka = $('#jangka').val();
        var lahir = $('#lahir').val();
        var men = $('#men').val();
        var usia = $('#usia').val();
        var sakit = $('#sakit').val();
       
        // console.log(jangka, nama, lahir, men, usia, sakit);
        $.ajax({
            url:'tambahData',
            data:{nama:nama, jangka:jangka, lahir:lahir, men:men, usia:usia, sakit: sakit},
            type:'POST',
            dataType:'JSON',
            success:function(data){
                if(data.error){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Tambah data gagal!',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    $('#dataset').DataTable().ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tambah data berhasil!',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    $('#dataset').DataTable().ajax.reload()
                }
            }
        });
    });
})

