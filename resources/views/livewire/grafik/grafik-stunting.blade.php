<div id="container2" class="p-4"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

Highcharts.chart('container2', {
    chart:  {
        type: 'column'
    },
    title: {
        text: 'Data Persentase Stunting'
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
        pointFormat: '<tr><td style="color:{series.color};padding:0"><b>Prevalensi Stunting</b> {series.name}: </td>' +
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
        data: [21.1,25.1,24.3,22.1,23.3,33.5,28.3,28.1,30.9,26.2,
            38.3,30.5,32,24.2,19,29,26.2,25.9,20.7,24.8,
            26.9,19.2,25.3,23,19.8,43,26.4,42.5,32.3,25.6,15.5,27.4,30.4,33.4,10.3,18.3,22.8,35.1]
    }, {
        name: '2018',
        data: [26.3,30.5,39.9,26.2,27.4,29.4,31.7,34,38.3,32,
            38,30.7,39.9,39.7,27,29.9,29.8,29.6,32.4,30.3,
            40.5,34.9,30.8,35.5,27.2,41.9,47.9,44.1,34.3,34.6,
            25.6,23.4,30,34.9,20.9,29.1,28.6,28.3]
    }, {
        name: '2019',
        data: [15.3,17.8,13.4,5.3,17.5,13.2,12.1,8.4,11.7,8.1,
            14.6,18.1,16.4,22.5,12.3,12.8,16.1,11.5,19.3,10.8,
            21.2,7.8,14.8,7.7,11,8.7,9.8,17.7,6,10,
            15.3,17.5,19.4,23.1,9,11.3,8.5,25.4]
    }, {
        name: '2020',
        data: [16.6,16.3,12,6.1,17.6,19.6,12.7,12.6,13.8,11,
            12.3,14,16.8,20.9,7.9,6.8,17.9,11.7,17.2,12.2,
            12.6,5.9,14.8,9.2,7.5,7.6,8.7,17,5.4,23,
            9,13.8,17.8,19.1,9.4,8.9,9.1,19.1]
    }, {
        name: '2021',
        data: [14.5,16.6,10.2,4.5,9.6,13.6,8.9,6.6,11.7,8.6,
            9.3,9.3,11.3,18.1,7.6,4.2,8.6,9.5,13.4,11.3,
            12.6,5.7,11.6,6.3,10.9,4.8,5.2,11.6,3.6,13.8,
            4.9,9.4,7.8,17.4,8.6,7.4,4.5,14.9]
    }]

});

</script>