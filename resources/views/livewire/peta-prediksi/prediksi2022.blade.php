<style type="text/css">
.leaflet-tooltip.no-background{
    background: transparent;
    border:0;
    box-shadow: none;
    font-size:10px;
}
.legend {
    line-height: 18px;
    color: #555;
    padding:  20px;
}
.legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
}
</style>
<main style="overflow-x: hidden !important">  
<div class="row">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h5>{{ __('Visualisasi Prediksi Pemetaan Tingkat Risiko Stunting Jawa Timur Tahun 2022') }}</h5>
            <div class="dropdown">
              <button class="btn bg-gradient-primary btn-sm mb-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                2022
              </button>
              @if(auth()->user())
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="{{ route('prediksi2019') }}">2019</a></li>
                  <li><a class="dropdown-item" href="{{ route('prediksi2020') }}">2020</a></li>
                  <li><a class="dropdown-item" href="{{ route('prediksi2021') }}">2021</a></li>
                  <li><a class="dropdown-item" href="{{ route('prediksi2022') }}">2022</a></li>
                </ul>
              @else
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="{{ route('peta-prediksi2019') }}">2019</a></li>
                  <li><a class="dropdown-item" href="{{ route('peta-prediksi2020') }}">2020</a></li>
                  <li><a class="dropdown-item" href="{{ route('peta-prediksi2021') }}">2021</a></li>
                  <li><a class="dropdown-item" href="{{ route('peta-prediksi2022') }}">2022</a></li>
                </ul>
              @endif
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div id="map" class="border-radius-lg" style="height: 460px;"></div>
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
	  	id: 'mapbox/outdoors-v12'
	});
  
  var map = L.map('map', {
        center: [-7.714265268560922, 113.06819518545991],
        zoom: 8,
        layers: [peta]
  });

  var api = 'http://127.0.0.1:8000/api/prediksi2022';
  
  //data api yang diambil
  var dataRisiko=[];
  
  //data geojson yang diambil
  var geojson=[];
  
  getData();

  function getColor(defuzzy){
        color="#3f48cc";
        if(defuzzy<1.5){
            color="#00ff00";
        }
        else if(defuzzy>=1.5 && defuzzy<2.5){
            color="#ffff00";
        }
        else if(defuzzy>=2.5){
            color="#ff0000";
        }
        return color;
    }

    function style(f) {
        var kodekab_json = f.properties.KODE;
        result = dataRisiko[kodekab_json];
        return {
            weight: 0.5,
            opacity: 0.5,
            color: 'black',
            dashArray: '0',
            fillOpacity: 0.9,
            fillColor: getColor(result.defuzzifikasi)
        };
    }

    function highlightFeature(e) {
	    var layer = e.target;

	    layer.setStyle({
            weight: 0,
            opacity: 1,
            color: 'white',
            dashArray: '0',
            fillOpacity: 1.5
	    });

	    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
		    layer.bringToFront();
	    }
    }
    
	function resetHighlight(e) {
		var layer = e.target;
		layer.setStyle({
			  weight: 0.5,
        opacity: 0.5,
        color: 'black',
        dashArray: '0',
        fillOpacity: 0.9
		});
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

var legend = L.control({position: 'bottomleft'});

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += "<h6>Tingkat Risiko</h6>";
    div.innerHTML += '<i style="background: #00ff00"></i><span>Rendah</span><br>';
    div.innerHTML += '<i style="background: #ffff00"></i><span>Sedang</span><br>';
    div.innerHTML += '<i style="background: #ff0000"></i><span>Tinggi</span><br>';

    return div;
};

legend.addTo(map);

  function getData(){
    $.ajax({
      url: api,
      dataType:'JSON',
      success:function(data){
        for(i=0;i<data.length;i++){
          var dataApi = data[i];
          var kabkota_id = dataApi.kabkota_id;
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
