<style type="text/css">
.leaflet-tooltip.no-background{
    background: transparent;
    border:0;
    box-shadow: none;
    font-size:10px;
}
</style>
<main style="overflow-x: hidden !important">  
<div class="row">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h5>{{ __('Visualisasi Pemetaan Tingkat Risiko Stunting Jawa Timur Tahun 2017') }}</h5>
            <div class="dropdown">
              <button class="btn bg-gradient-primary btn-sm mb-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                2017
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">2018</a></li>
                <li><a class="dropdown-item" href="javascript:;">2019</a></li>
                <li><a class="dropdown-item" href="javascript:;">2020</a></li>
                <li><a class="dropdown-item" href="javascript:;">2021</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div id="map" class="border-radius-lg" style="height: 420px;"></div>
        </div>
      </div>
    </div>
  </div>
</main>

<script type="text/javascript">
  var peta = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	  	id: 'mapbox/streets-v11'
	});
  
  var map = L.map('map', {
        center: [-7.54409437100132, 112.20990556692459],
        zoom: 8,
        layers: [peta]
  });

  var api = 'http://127.0.0.1:8000/api/stunting2017';
  
  //data api yang diambil
  var dataRisiko=[];
  
  //data geojson yang diambil
  var geojson=[];
  
  getData();

  function getColor(defuzzy){
        color="#3f48cc";
        if(defuzzy<2){
            color="#00ff00";
        }
        else if(defuzzy>=2 && defuzzy<3){
            color="#ffff00";
        }
        else if(defuzzy>=3){
            color="#ff0000";
        }
        return color;
    }

    function style(f) {
        var kodekab_json = f.properties.KODE;
        result = dataRisiko[kodekab_json];
        console.log(result);
        return {
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '5',
            fillOpacity: 0.7,
            fillColor: getColor(result.defuzzification)
        };
    }

    function highlightFeature(e) {
	    var layer = e.target;

	    layer.setStyle({
            weight: 5,
            color: '#f00',
            dashArray: '',
            fillOpacity: 0.7
	    });

	    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
		    layer.bringToFront();
	    }
    }
    
	function resetHighlight(e) {
		var layer = e.target;
		layer.setStyle({
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
		})
	}

  function onEachFeature(f, layer){
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight
    });
    var kab_geojson= f.properties.KODE;
    data = dataRisiko[kab_geojson];
    layer.bindTooltip(f.properties['NAME_2'],{
            permanent:true,
            direction:"center",
            className:"no-background"
    });

  }

  function getData(){
    $.ajax({
      url: api,
      dataType:'JSON',
      success:function(data){
        for(i=0;i<data.length;i++){
          var dataApi = data[i];
          var kabkota_id = dataApi.id_kab;
          dataRisiko[kabkota_id] = dataApi;
        }
        
          $.getJSON("{{asset('assets')}}/jatim.json", function(data){
            for(i=0;i<39;i++){
              var kodekab_json = data.features[0].properties.KODE;
            }
            geojson[kodekab_json] = L.geoJSON(data,{
                onEachFeature: onEachFeature,
                style: style
            }).addTo(map);
          });
      }
    });
  }

</script>
