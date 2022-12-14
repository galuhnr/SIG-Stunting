<div id="container2" class="p-4"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

Highcharts.chart('container2', {
    chart:  {
        type: 'column'
    },
    title: {
        text: 'Data Persentase Cakupan Desa UCI (Universal Child Immunization)'
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
        pointFormat: '<tr><td style="color:{series.color};padding:0"><b>Desa UCI</b> {series.name}: </td>' +
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
        data: [88.9,80.5,94.9,95.2,97.2,99.4,86.7,86.8,56.9,100.0,
            92.2,84.6,71.2,81.1,93.5,75.0,80.7,84.9,81.1,94.9,
            64.1,99.5,93.0,94.9,92.7,47.0,63.4,76.7,93.1,100.0,
            57.1,82.5,96.6,94.1,100.0,100.0,91.6,62.5]
    }, {
        name: '2018',
        data: [100.0,72.0,89.8,90.8,94.0,97.4,86.4,87.3,72.6,98.6,
            91.3,87.5,87.0,87.4,98.0,89.1,80.4,64.8,85.4,82.1,
            70.5,98.4,91.8,96.0,94.9,47.0,68.3,71.4,83.5,0.0,
            71.4,71.9,69.0,94.1,83.3,100.0,99.4,62.5]
    }, {
        name: '2019',
        data: [73.1,80.1,91.1,99.3,90.3,97.1,96.9,92.2,95.6,97.7,
            97.7,85.3,87.3,83.8,98.0,93.8,75.8,91.9,88.3,88.5,
            100.0,99.3,89.0,97.3,98.3,51.2,73.7,82.5,93.7,100.0,
            90.5,91.2,93.1,91.2,94.4,100.0,100.0,87.5]
    }, {
        name: '2020',
        data: [67.3,76.5,92.4,91.5,91.5,93.0,94.4,90.7,87.9,96.8,
            94.5,46.3,76.4,84.7,97.2,95.7,85.3,85.2,83.0,88.5,
            100.0,99.1,93.3,97.3,95.8,42.3,54.8,63.0,90.7,95.7,
            71.4,71.9,65.5,64.7,88.9,96.3,98.1,87.5]
    }, {
        name: '2021',
        data: [66.9,93.2,86.6,78.6,98.8,45.5,87.4,82.9,46.4,91.7,
            96.8,29.4,76.4,91.5,95.2,88.2,82.0,82.0,77.7,82.1,
            91.7,97.2,58.2,95.6,92.4,26.0,36.7,59.3,40.4,95.7,
            81.0,45.6,93.1,26.5,88.9,100.0,98.7,87.5]
    }]

});

</script>