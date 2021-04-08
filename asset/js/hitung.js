var visibleQ = 0;

function showQ() {
    $(".myquestion").hide()
    $(".myquestion:eq(" + visibleQ + ")").show();
}
showQ();

$(document).ready(function() {
    if (visibleQ == 0) {
        $('.qback').hide()

    }
})
$(document).ready(function() {
    $(this).on('click', '.qnext', function() {
        var age = $('#umurSet').val();
        var gender = $('#genderSet').val();
        var jundice = $('#jundiceSet').val();
        var autism = $('#autismSet').val();
        var pilih1 = $('input[name=pilih1]:checked').val();
        var pilih2 = $('input[name=pilih2]:checked').val();
        var pilih3 = $('input[name=pilih3]:checked').val();
        var pilih4 = $('input[name=pilih4]:checked').val();
        var pilih5 = $('input[name=pilih5]:checked').val();
        var pilih6 = $('input[name=pilih6]:checked').val();
        var pilih7 = $('input[name=pilih7]:checked').val();
        var pilih8 = $('input[name=pilih8]:checked').val();
        var pilih9 = $('input[name=pilih9]:checked').val();
        var pilih10 = $('input[name=pilih10]:checked').val();

        if (visibleQ <= 2 && visibleQ >= 0) {
            $.ajax({
                url: 'pengguna/hitung',
                type: 'POST',
                data: {
                    age: age,
                    gender: gender,
                    jundice: jundice,
                    autism: autism,
                    pilih1: pilih1,
                    pilih2: pilih2,
                    pilih3: pilih3,
                    pilih4: pilih4,
                    pilih5: pilih5,
                    pilih6: pilih6,
                    pilih7: pilih7,
                    pilih8: pilih8,
                    pilih9: pilih9,
                    pilih10: pilih10,
                    visibleQ: visibleQ
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data.error) {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Pastikan data terisi dengan benar!',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                    if (data.next) {
                        visibleQ++;
                        showQ();
                        $('.qback').show();
                        if (visibleQ == 2) {
                            $('.qnext').addClass('btn-primary').removeClass('btn-success').html('Submit');
                        }
                    }
                    if (data.status) {
                        $('#normalcell').html(data.totnormal);
                        $('#autiscell').html(data.totautis);
                        $('#resultcell').html(data.status);
                        $('.tableresultSet').show();
                        $('#headtitle').html('Hasil Deteksi');
                        $('#ptitle').html('<small>note: hasil berikut tidak bisa menjadi acuan utama, periksa ke dokter adalah langkah terbaik</small>');
                        $('.qnext').hide();
                        $('.qback').css({ 'margin-right': '0' });
                    }
                }
            })


        }

    });
})
$(document).on('click', '.qback', function() {
    if (visibleQ == 0) {
        console.log('mantap');
    } else {
        visibleQ--;
        showQ();
        if (visibleQ == 1) {
            $('.tableresultSet').hide();
            $('.qnext').addClass('btn-success').removeClass('btn-primary').html('Lanjutkan').show();
            $('.qback').css({ 'margin-right': '1em' }).show()
        }
        if (visibleQ < 1) {
            $('.qback').hide()
        }
    }

});


$(document).ready(function() {
    $(document).on('click', '#datalatih', function() {
        if ($(".tabeldatalatih").is(':visible')) {
            $(".tabeldatalatih").css({ 'visibility': 'hidden', 'display': 'none', 'opacity': '1.0' }).animate({ opacity: 0.0 }, 400);
            $(this).addClass('btn-success').removeClass('btn-secondary').html('Data Latih');
        } else if ($(".tabeldatauji").is(':visible')) {
            $(".tabeldatauji").css({ 'visibility': 'hidden', 'display': 'none', 'opacity': '1.0' }).animate({ opacity: 0.0 }, 400);
            $("#datauji").addClass('btn-success').removeClass('btn-secondary').html('Data Uji');
            $(".tabeldatalatih").css({ 'visibility': 'unset', 'display': 'inherit', 'opacity': '0.0' }).animate({ opacity: 1.0 }, 200);
            $(this).addClass('btn-secondary').removeClass('btn-success').html('<i class="fas fa-eye-slash"></i>');
        } else {
            $(".tabeldatalatih").css({ 'visibility': 'unset', 'display': 'inherit', 'opacity': '0.0' }).animate({ opacity: 1.0 }, 200);
            $(this).addClass('btn-secondary').removeClass('btn-success').html('<i class="fas fa-eye-slash"></i>');
        }

    });
});
$(document).ready(function() {
    $(document).on('click', '#datauji', function() {
        if ($(".tabeldatauji").is(':visible')) {
            $(".tabeldatauji").css({ 'visibility': 'hidden', 'display': 'none', 'opacity': '1.0' }).animate({ opacity: 0.0 }, 400);
            $(this).addClass('btn-success').removeClass('btn-secondary').html('Data Uji');
        } else if ($(".tabeldatalatih").is(":visible")) {
            $(".tabeldatalatih").css({ 'visibility': 'hidden', 'display': 'none', 'opacity': '1.0' }).animate({ opacity: 0.0 }, 400);
            $("#datalatih").addClass('btn-success').removeClass('btn-secondary').html('Data Latih');
            $(".tabeldatauji").css({ 'visibility': 'unset', 'display': 'inherit', 'opacity': '0.0' }).animate({ opacity: 1.0 }, 200);
            $(this).addClass('btn-secondary').removeClass('btn-success').html('<i class="fas fa-eye-slash"></i>');
        } else {
            $(".tabeldatauji").css({ 'visibility': 'unset', 'display': 'inherit', 'opacity': '0.0' }).animate({ opacity: 1.0 }, 200);
            $(this).addClass('btn-secondary').removeClass('btn-success').html('<i class="fas fa-eye-slash"></i>');
        }

    });
});

$(document).on('click', '#cekdata', function(e) {
    $.ajax({
        url: "admin/CekDataLatihUji",
        type: "POST",
        dataType: "JSON",

    });

})
$(document).on('click', '#cektesting', function(e) {
    var r = $("#tbodyres").find("td").length;

    if (r == 0) {
        $.ajax({
            url: "admin/getCounting",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $("#cektesting").addClass('btn-secondary').removeClass('btn-primary');
                $('.resuji').css({ 'visibility': 'unset', 'display': 'flex', 'opacity': '0.0' }).animate({ opacity: 1.0 }, 600);
                $.each(data["A1_score"], function(key, value) {
                    $('#tbodyres').append(
                        '<tr id="idscore">' +
                        '<td>' + key + '</td><td>' + data["A1_score"][key] + '</td>' +
                        '<td>' + data["A2_score"][key] + '</td>' +
                        '<td>' + data["A3_score"][key] + '</td>' +
                        '<td>' + data["A4_score"][key] + '</td>' +
                        '<td>' + data["A5_score"][key] + '</td>' +
                        '<td>' + data["A6_score"][key] + '</td>' +
                        '<td>' + data["A7_score"][key] + '</td>' +
                        '<td>' + data["A8_score"][key] + '</td>' +
                        '<td>' + data["A9_score"][key] + '</td>' +
                        '<td>' + data["A10_score"][key] + '</td></tr>'
                    );

                });
                $.each(data["jk"], function(key2, value2) {
                    $('#tbodyresgen').append(
                        '<tr id="idgen">' +
                        '<td>' + key2 + '</td><td>' + data["jk"][key2] + '</td>'
                    );
                });
                $.each(data["4"], function(key3, value3) {
                    $('#tbodyresage').append(
                        '<tr id="idage">' +
                        '<td>' + key3 + '</td><td>' + data["4"][key3] + '</td>' +
                        '<td>' + data["5"][key3] + '</td>' +
                        '<td>' + data["6"][key3] + '</td>' +
                        '<td>' + data["7"][key3] + '</td>' +
                        '<td>' + data["8"][key3] + '</td>' +
                        '<td>' + data["9"][key3] + '</td>' +
                        '<td>' + data["10"][key3] + '</td>' +
                        '<td>' + data["11"][key3] + '</td>'
                    );
                });
                $.each(data["jundice"], function(key4, value4) {
                    $('#tbodyresjun').append(
                        '<tr id="idjun">' +
                        '<td>' + key4 + '</td><td>' + data["jundice"][key4] + '</td>'
                    );
                });
                $.each(data["autis_tree"], function(key5, value5) {
                    $('#tbodyresautis').append(
                        '<tr id="idautis">' +
                        '<td>' + key5 + '</td><td>' + data["autis_tree"][key5] + '</td>'
                    );
                });
            }
        });

    }
    // else {
    //     $("#cektesting").addClass('btn-primary').removeClass('btn-secondary');
    //     $('.resuji').css({ 'visibility': 'hidden', 'display': 'none', 'opacity': '1.0' }).animate({ opacity: 0.0 }, 800);
    // }
});


$(document).on('click', '.close_res', function(e) {
    $(".resuji").animate({ opacity: 0.0 }, 200, function() {
        $('.resuji').css({ 'visibility': 'hidden', 'display': 'none' });
    });
});

// $(document).on('click', 'input:radio', function() {
//     // alert($("input:radio").val());
//     $('input:radio').change(function() {
//         console.log($('input[name=pilih1]').val());
//     });
//     // if ($("input:radio").is(":checked")) {

//     // }
// });