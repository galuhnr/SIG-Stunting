<div id="container2" class="p-4"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

Highcharts.chart('container2', {
    chart:  {
        type: 'column'
    },
    title: {
        text: 'Data Persentase Pelayanan Kesehatan Balita'
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
        pointFormat: '<tr><td style="color:{series.color};padding:0"><b>pelayanan kesehatan </b> {series.name}: </td>' +
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
        data: [73.5,61.7,67.9,67.7,61.3,66.0,67.0,71.4,66.9,65.9,
            73.7,76.1,70.1,63.4,66.2,68.3,67.4,53.8,66.8,71.3,
            63.6,72.2,72.5,73.1,68.5,52.9,68.9,69.2,71.6,70.0,
            52.2,58.8,63.0,64.7,69.7,78.6,69.8,68.0]
    }, {
        name: '2018',
        data: [85.5,76.8,82.6,85.1,77.6,90.0,88.1,90.0,82.7,82.7,
            88.7,93.7,88.5,81.6,89.5,84.1,87.2,69.6,86.7,93.5,
            82.2,91.8,89.8,91.0,86.1,68.4,79.9,85.7,91.2,90.7,
            62.6,81.9,77.3,83.3,90.0,99.5,90.5,86.3]
    }, {
        name: '2019',
        data: [92.2,80.1,90.9,89.8,82.3,91.0,92.4,92.3,85.2,86.8,
            101.1,92.6,92.8,90.6,96.2,87.3,92.2,92.1,87.9,98.1,
            83.8,90.3,90.9,100.0,91.4,63.0,84.4,91.6,95.8,90.5,
            73.0,85.0,99.4,82.2,96.4,100.1,91.6,93.2]
    }, {
        name: '2020',
        data: [86.4,99.0,92.1,75.2,77.3,75.2,75.9,101.0,79.5,56.0,
            103.1,85.4,91.1,86.5,94.2,91.4,94.3,72.8,70.6,106.3,
            84.8,85.6,87.9,99.1,103.2,59.9,98.6,88.6,96.2,93.4,
            53.2,77.7,90.3,65.8,97.8,98.8,72.5,84.5]
    }, {
        name: '2021',
        data: [95.1,92.5,88.6,77.1,78.2,74.5,94.7,86.3,100.1,73.7,
            94.9,89.2,94.1,97.8,99.1,80.7,97.8,81.2,79.5,102.6,
            83.1,81.7,89.3,94.0,102.3,68.4,76.3,85.8,102.5,95.9,
            35.6,72.9,88.5,71.3,100.0,99.8,91.6,96.7]
    }]

});

</script>