// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
$(document).on('click', '#cekakurasi', function() {
    var r = $("#notmatch").find("td").length;
    if (r == 0) {
        $.ajax({
            url: 'admin/Test',
            type: 'POST',
            dataType: 'JSON',
            success: function(data) {
                var akurasi_n = data.akurasi_n;
                var akurasi_y = data.akurasi_y;
                var akurasi;
                var akurasitotal = data.totakurasi;
                var precision = data.precision;
                var recall = data.recall;
                var f1score = data.f1score;

                $('.totakurasi').html(akurasitotal + '%')
                $('.precision').html(precision + '%')
                $('.recall').html(recall + '%')
                $('.f1score').html(f1score + '%')

                $('.bar1').css('width', akurasitotal + '%')
                $('.bar2').css('width', precision + '%')
                $('.bar3').css('width', recall + '%')
                $('.bar4').css('width', f1score + '%')

                if (data.akurasi_benar > data.akurasi_salah) {
                    akurasi = data.akurasi_benar;
                } else {
                    akurasi = data.akurasi_salah;
                }
                $('input[id="normal"]').val(data.normal);
                $('input[id="autis"]').val(data.autis);
                $('#persen').text(akurasi + ' %');
                $.each(data["dt_salah"], function(key, value) {
                    // console.log(value['id']);
                    $('#notmatch').append(
                        '<tr>' +
                        '<td>' + value['id'] + '</td><td>' + value['class'] + '</td><td>' + value['prediksi'] + '</td></tr>'
                    );

                });
                var myPieChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Tepat", "Tidak Tepat"],
                        datasets: [{
                            data: [data.akurasi_benar, data.akurasi_salah],
                            backgroundColor: ['#4e73df', '#1cc88a'],
                            hoverBackgroundColor: ['#2e59d9', '#17a673'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                        legend: {
                            display: false
                        },
                        cutoutPercentage: 80,
                    },
                });
            }
        })
    } else {
        $(this).unbind("click");
    }
});