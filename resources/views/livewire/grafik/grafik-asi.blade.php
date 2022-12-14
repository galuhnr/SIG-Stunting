<div id="container2" class="p-4"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

Highcharts.chart('container2', {
    chart:  {
        type: 'column'
    },
    title: {
        text: 'Data Persentase Cakupan Bayi(0-6 Bulan) Mendapat ASI Eksklusif '
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
        pointFormat: '<tr><td style="color:{series.color};padding:0"><b>Cakupan ASI Eksklusif</b> {series.name}: </td>' +
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
        data: [71.2,83.1,70.2,67.1,88.1,76.7,70.0,82.9,83.7,78.9,
            70.5,79.9,73.4,68.3,64.7,74.2,81.7,83.4,76.2,80.6,
            77.1,88.2,78.9,73.3,71.2,55.2,59.6,62.1,77.2,62.5,
            79.3,75.3,65.1,60.1,66.7,70.5,65.1,76.9]
    }, {
        name: '2018',
        data: [88.8,83.2,57.7,66.8,87.8,73.9,72.5,83.5,84.6,86.3,
            75.2,82.5,72.7,73.2,72.0,77.9,83.0,83.1,76.6,84.1,
            76.6,87.9,79.4,78.5,75.9,46.4,65.0,70.2,90.2,64.2,
            75.3,81.7,77.0,71.0,75.5,76.7,71.6,75.6]
    }, {
        name: '2019',
        data: [96.4,84.6,62.8,70.0,88.9,78.1,75.1,86.7,85.6,86.6,
            80.8,80.5,78.7,75.7,70.3,76.0,82.8,78.0,81.0,76.1,
            81.4,89.3,84.8,78.7,78.9,46.9,60.7,81.2,93.5,62.2,
            75.9,81.4,75.6,65.5,86.3,75.3,72.5,80.4]
    }, {
        name: '2020',
        data: [64.8,78.8,50.6,61.4,92.3,13.0,63.7,83.3,67.0,85.0,
            73.2,74.2,22.4,62.1,64.0,71.8,79.4,71.2,75.3,78.0,
            75.4,89.0,76.7,68.5,70.5,42.6,48.8,69.4,89.8,67.2,
            81.6,84.8,72.4,51.2,83.7,65.8,73.6,72.1]
    }, {
        name: '2021',
        data: [91.6,53.3,56.3,73.0,42.1,53.0,75.6,83.7,63.3,89.4,
            81.5,83.0,58.3,71.5,70.8,71.5,88.7,78.3,85.8,91.7,
            54.0,92.2,84.6,78.4,83.5,46.2,51.4,86.6,44.2,68.1,
            75.5,77.9,77.0,67.3,84.2,78.7,72.2,82.3]
    }]

});

</script>