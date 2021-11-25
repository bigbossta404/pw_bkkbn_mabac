
$(document).ready(function() {
    $(this).on('click','.btntambah',function(){
        var nama = $('#nama').val();
        var jangka = $('#jangka').val();
        var lahir = $('#lahir').val();
        var men = $('#men').val();
        var usia = $('#usia').val();
        var sakit = $('#sakit').val();
        
        jmldata = $('#jmldata').text();
        jmldata_array = jmldata.split(' ');
        // console.log(jangka, nama, lahir, men, usia, sakit);
        $.ajax({
            url:'tambahdata',
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
                    $('#entrydata').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tambah data berhasil!',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    $('#dataset').DataTable().ajax.reload()
                    $('#jmldata').html(parseInt(jmldata_array[0])+1);
                }
            }
        });
    });

    $(this).on('click','.btnhapus', function(){
        var id = $(this).attr('id');
        jmldata = $('#jmldata').text();
        jmldata_array = jmldata.split(' ');
        Swal.fire({
            title: 'Yakin hapus data?',
            text: "Data terhapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'admin/deleteData/'+id,
                    type:'POST',
                    dataType: 'JSON',
                    success:function(data){

                        if(data == 'error'){
                            Swal.fire(
                                'Gagal hapus data!',
                                'Data kriteria ID ' + id +' gagal terhapus',
                                'error'
                            );
                        }else if(data == 'sukses'){
                            Swal.fire(
                                'Terhapus!',
                                'Data kriteria ID ' + id +' sudah terhapus',
                                'success'
                            );
                                $('#dataset').DataTable().ajax.reload()
                                $('#jmldata').html(parseInt(jmldata_array[0])-1);
                        }
                    }
                });  

            }
        })
    });
})

