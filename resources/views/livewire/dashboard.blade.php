<main>  
  <div class="container-fluid py-2">
    <div class="row">
      <div class="container mb-lg-0 mb-2 ovf-hidden">
        <div class="card">
          <div class="card-title">
          </div>
          <div class="card-body p-3">
            <div id="map" style="height: 380px;"></div>
          </div>
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

  var api = 'http://127.0.0.1:8000/api/cluster2017';
  //data api yang diambil
  var dataRisiko=[];
  
  //data geojson yang diambil
  var geojson=[];
  
  getData();

  
    // atur style
    function style(f) {
        var kodekab_json =f.properties.KODE;
        result = dataRisiko[kodekab_json];
        console.log(result);
        
    }

    function highlightFeature(e) {
	    var layer = e.target;

	    layer.setStyle({
            weight: 0.5,
            color: '#f00',
            dashArray: '',
            fillOpacity: 0.8
	    });

	    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
		    layer.bringToFront();
	    }
    }
    
  // update info
	function resetHighlight(e) {
		var layer = e.target;
		layer.setStyle({
			weight: 0.5,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.8,
		})
	}

  function onEachFeature(f, layer){
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight
        });
        var kab_geojson= f.properties.KODE;
        data = dataRisiko[kab_geojson];
        // console.log(data);
        // var popUp='<table>'+
		// 			'<tr>'+
		// 				'<td colspan="4"><h6>'+data.kecamatan+'</h6></td>'+
		// 			'</tr>'+
		// 			'</table>';
		// layer.bindPopup(popUp);
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
                var kodekab_json = data.features[i].properties.KODE;
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
