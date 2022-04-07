
$(document).ready(function() {
    $(this).on('click','.btntambah',function(){
        var nama = $('#nama').val();
        var menyusui = $('#menyusui').val();
        var hamil = $('#hamil').val();
        var ku = $('#ku').val();
        var penyakit = $('#penyakit').val();
        var bb = $('#bb').val();
        
        jmldata = $('#jmldata').text();
        jmldata_array = jmldata.split(' ');
        // console.log(jangka, nama, lahir, men, usia, sakit);
        $.ajax({
            url:'tambahdata',
            data:{nama:nama, menyusui:menyusui, hamil:hamil, ku:ku, penyakit:penyakit,bb:bb},
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

    $(this).on('click','.btnupdate ',function(){
       let idkriteria = $(this).attr('id')
        // console.log(jangka, nama, lahir, men, usia, sakit);
        $.ajax({
            url:'admin/getDataUpdate',
            data:{idkriteria:idkriteria},
            type:'POST',
            dataType:'JSON',
            success:function(data){
               $('#namaupdate').val(data.nama);
               $('#menyusuiupdate option[value='+data.menyusui+']').attr('selected','selected');
               $('#hamilupdate option[value='+data.hamil+']').attr('selected','selected');
               $('#kuupdate option[value='+data.ku+']').attr('selected','selected');
               $('#penyakitupdate option[value='+data.penyakit+']').attr('selected','selected');
               $('#bbupdate option[value='+data.bb+']').attr('selected','selected');
               $('.saveupdate').attr('id',idkriteria)
            }
        });
    });

    $(this).on('click','.saveupdate',function(){
        var nama = $('#namaupdate').val();
        var menyusui = $('#menyusuiupdate').val();
        var hamil = $('#hamilupdate').val();
        var ku = $('#kuupdate').val();
        var penyakit = $('#penyakitupdate').val();
        var bb = $('#bbupdate').val();
        var id = $(this).attr('id');

        // console.log(jangka, nama, lahir, men, usia, sakit);
        $.ajax({
            url:'admin/saveUpdate',
            data:{id:id,nama:nama, menyusui:menyusui, hamil:hamil, ku:ku, penyakit:penyakit,bb:bb},
            type:'POST',
            dataType:'JSON',
            success:function(data){
                if(data.error){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Update data gagal!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#dataset').DataTable().ajax.reload();
                }else{
                    $('#updatedata').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Update data berhasil!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#dataset').DataTable().ajax.reload()
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

