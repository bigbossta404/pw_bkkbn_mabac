$(document).ready(function() {
    $(document).on('click', '#datalatih', function() {
        if ($(".tabeldatalatih").is(':visible')) {
            $(".tabeldatalatih").css({ 'visibility': 'hidden', 'display': 'none', 'opacity': '1.0' }).animate({ opacity: 0.0 }, 400);
            $(this).addClass('btn-primary').removeClass('btn-secondary').html('Data Latih');
        } else if ($(".tabeldatauji").is(':visible')) {
            $(".tabeldatauji").css({ 'visibility': 'hidden', 'display': 'none', 'opacity': '1.0' }).animate({ opacity: 0.0 }, 400);
            $("#datauji").addClass('btn-success').removeClass('btn-secondary').html('Data Uji');
            $(".tabeldatalatih").css({ 'visibility': 'unset', 'display': 'inherit', 'opacity': '0.0' }).animate({ opacity: 1.0 }, 200);
            $(this).addClass('btn-secondary').removeClass('btn-success').html('<i class="fas fa-eye-slash"></i>');
        } else {
            $(".tabeldatalatih").css({ 'visibility': 'unset', 'display': 'inherit', 'opacity': '0.0' }).animate({ opacity: 1.0 }, 200);
            $(this).addClass('btn-secondary').removeClass('btn-primary').html('<i class="fas fa-eye-slash"></i>');
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
            $("#datalatih").addClass('btn-primary').removeClass('btn-secondary').html('Data Latih');
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
        url: "pengguna/CekDataLatihUji",
        type: "POST",
        dataType: "JSON",

    });

})
$(document).on('click', '#cektesting', function(e) {
    var r = $("#tbodyres").find("td").length;

    if (r == 0) {
        $.ajax({
            url: "pengguna/getCounting",
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

$(document).on('click', 'input:radio', function() {
    // alert($("input:radio").val());
    $('input:radio').change(function() {
        console.log($('input[name=pilih1]').val());
    });
    // if ($("input:radio").is(":checked")) {

    // }
});