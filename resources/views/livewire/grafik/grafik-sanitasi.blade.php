<div id="container2" class="p-4"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

Highcharts.chart('container2', {
    chart:  {
        type: 'column'
    },
    title: {
        text: 'Data Persentase Jumlah KK Terhadap Fasilitas Sanitasi Layak'
    },
    subtitle:   {
        text: 'Provinsi Jawa Timur'
    },
    xAxis: {
        categories: ['Pacitan','Ponorogo','Trenggalek','Tulungagung','Blitar','Kediri','Malang','Lumajang','Jember','Banyuwangi',
                     'Bondowoso','Situbondo','Probolinggo','Pasuruan','Sidoarjo','Mojokerto','Jombang','Nganjuk','Madiun','Magetan',
                     'Ngawi','Bojonegoro','Tuban','Lamongan','Gresik','Bangkalan','Sampang','Pamekasan','Sumenep','Kota Kediri',
                     'Kota Blitar','Kota Malang','Kota Probolinggo','Kota Pasuruan','Kota Mojokerto','Kota Madiun','Kota Surabaya','Kota Batu'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Persentase'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0"><b>Sanitasi Layak </b> {series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} %</b></td></tr>',
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
        name: '2017',
        data: [72.9,87.6,70.7,83.7,88.2,71.6,76.6,67.1,60.9,83.7,
            54.0,37.6,67.9,69.1,87.7,80.3,87.1,25.2,90.2,97.3,78.5,
            97.1,77.1,100.0,98.5,76.6,74.8,94.3,55.0,94.2,100.2,
            84.5,75.9,86.5,93.6,100.0,97.8,98.9]
    }, {
        name: '2018',
        data: [74.8,90.9,91.4,84.7,88.3,82.4,80.0,60.2,60.6,73.4,
            59.0,50.0,69.2,81.6,90.0,79.4,85.8,97.1,92.8,95.4,
            80.5,99.4,81.6,100.0,99.2,76.5,79.6,96.7,78.1,93.4,
            100.,77.,94.,88.,95.,100.,98.,96.6]
    }, {
        name: '2019',
        data: [91.3,95.1,100.0,97.3,97.6,88.6,93.3,94.7,74.9,100.0,
            66.2,66.6,74.0,83.9,92.8,88.1,94.5,98.4,97.2,100.0,
            90.2,96.8,82.6,100.0,99.4,97.8,92.7,99.9,88.7,100.3,
            100.0,100.0,95.6,93.6,97.9,100.0,98.2,100.0]
    }, {
        name: '2020',
        data: [100.0,100.0,100.0,87.7,96.4,93.3,97.6,98.2,76.2,100.0,
            75.8,69.9,74.7,85.4,94.2,92.3,92.7,99.5,98.1,100.0,
            100.0,97.8,87.9,100.0,100.0,94.2,94.2,100.0,91.5,100.0,
            100.0,100.0,95.6,93.8,100.0,100.0,98.3,100.0]
    }, {
        name: '2021',
        data: [100.0,100.0,100.0,99.0,96.8,95.5,97.7,100.0,78.1,100.0,
            83.1,70.7,78.3,87.7,97.5,96.4,94.5,100,100,99.8,
            100.0,99.9,88.6,100.0,100.0,97.0,100.0,100.0,93.2,100.0,
            100.0,100.0,96.3,95.9,100.0,99.9,98.9,100.0]
    }]

});

</script>