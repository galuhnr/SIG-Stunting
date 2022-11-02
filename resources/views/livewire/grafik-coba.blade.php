<div class="text-right mx-4">
       <select id="myselect" name="myselect" onchange="discountPostback()">
            <option enabled value>Pilih Kabupaten/Kota</option>
            <option value="0">Surabaya</option>
            <option value="1">Sidoarjo</option>
        </select>
</div>
<div id="container2" class="p-4"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

var pelayanan=1;
var pelat = 0;
var valu;
var pela=0;
var pelayanan2017=15;
var pelayanan2018=75;

function discountPostback() {
    var selectedSource = document.getElementById("myselect").value;
    console.log(selectedSource);
}
$.ajax({
    // url: 'http://127.0.0.1:8000/api/tingkat-risiko',
    // dataType: 'JSON',
    success: function(data){
        if(selectedSource=pelayanan){
            
                    pela = pelayanan2017;
             
        }else if(selectedSource=pelat){
           
                    pela = pelayanan2018;

        }
    
        Highcharts.chart('container2', {
            title: {
                text: 'Data Kota Surabaya'
            },

            yAxis: {
                title: {
                    text: 'Jumlah Data'
                }
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

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2017
                }
            },

            series: [{
                name: 'Pelayanan Kesehatan',
                data: [25178,23152,24571,22669,24405]
            }, {
                name: 'Sanitasi Layak',
                data: [403354,414573,180847,196489,196822]
            }, {
                name: 'ASI Eksklusif',
                data: [3808,3599,1138,2051,5474]
            }, {
                name: 'Kasus Stunting',
                data: [21.1,26.3,15.3,16.6,14.5]
            }, {
                name: 'Desa UCI',
                data: [152,171,125,115,111]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

    }
});

</script>