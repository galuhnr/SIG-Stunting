<div id="container" class="p-4" ></div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    
    var rendah2017=0;
    var sedang2017=0;
    var tinggi2017=0;

    var rendah2018=0;
    var sedang2018=0;
    var tinggi2018=0;

    var rendah2019=0;
    var sedang2019=0;
    var tinggi2019=0;

    var rendah2020=0;
    var sedang2020=0;
    var tinggi2020=0;

    var rendah2021=0;
    var sedang2021=0;
    var tinggi2021=0;

    //get data
    $.ajax({
        url: 'http://127.0.0.1:8000/api/tingkat-risiko',
        dataType: 'JSON',
        success: function(data){
            for(i=0;i<data.length;i++){
                var dataAll = data[i];
                var tahun = dataAll.tahun_id;
                var risiko = dataAll.tingkat_risiko;
                if(tahun == 1){
                    switch(risiko){
                        case "Rendah":
                            rendah2017++;
                            break;
                        case "Sedang":
                            sedang2017++;
                            break;
                        case "Tinggi":
                            tinggi2017++
                            break;
                        default:
                            console.log("gagal");
                    }
                }else if(tahun == 2){
                    switch(risiko){
                        case "Rendah":
                            rendah2018++;
                            break;
                        case "Sedang":
                            sedang2018++;
                            break;
                        case "Tinggi":
                            tinggi2018++
                            break;
                        default:
                            console.log("gagal");
                    }
                }else if(tahun == 3){
                    switch(risiko){
                        case "Rendah":
                            rendah2019++;
                            break;
                        case "Sedang":
                            sedang2019++;
                            break;
                        case "Tinggi":
                            tinggi2019++
                            break;
                        default:
                            console.log("gagal");
                    }
                }else if(tahun == 4){
                    switch(risiko){
                        case "Rendah":
                            rendah2020++;
                            break;
                        case "Sedang":
                            sedang2020++;
                            break;
                        case "Tinggi":
                            tinggi2020++
                            break;
                        default:
                            console.log("gagal");
                    }
                }else if(tahun == 5){
                    switch(risiko){
                        case "Rendah":
                            rendah2021++;
                            break;
                        case "Sedang":
                            sedang2021++;
                            break;
                        case "Tinggi":
                            tinggi2021++
                            break;
                        default:
                            console.log("gagal");
                    }
                }
            }

            Highcharts.chart('container', {
                chart: {
                    type: 'column',
                },
                title: {
                    text: 'Perbandingan Tingkat Risiko Stunting Provinsi Jawa Timur'
                },
                subtitle: {
                    text: 'menggunakan metode fuzzy'
                },
                xAxis: {
                    categories: [
                        '2017',
                        '2018',
                        '2019',
                        '2020',
                        '2021'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Kabupaten/Kota'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} kecamatan</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Rendah',
                    color: 'green',
                    data: [rendah2017,rendah2018,rendah2019,rendah2020,rendah2021]
                }, {
                    name: 'Sedang',
                    color: 'yellow',
                    data: [sedang2017,sedang2018,sedang2019,sedang2020,sedang2021]
                }, {
                    name: 'Tinggi',
                    color: 'red',
                    data: [tinggi2017,tinggi2018,tinggi2019,tinggi2020,tinggi2021]
                }]
        });
        }
    });
</script>