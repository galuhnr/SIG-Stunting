<main style="overflow-x: hidden !important">  
<div class="row">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h5>{{ __('Titik Lokasi Fasilitas Kesehatan Jawa Timur') }}</h5>
          </div>
        </div>
        <div class="card-body p-3">
          <div id="map" class="border-radius-lg" style="height: 460px;"></div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
 
<script>
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

  // mapboxgl.accessToken = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
  // const map = new mapboxgl.Map({
  //   container: 'map',
  //   style: 'mapbox://styles/mapbox/streets-v12',
  //   center: [113.06819518545991, -7.714265268560922], // starting position
  //   zoom: 8
  // });
  
  var api = 'http://127.0.0.1:8000/api/faskes';
  
  //data api yang diambil
  var dataRisiko=[];
  getData();

  function getData(){
    $.ajax({
      url: api,
      dataType:'JSON',
      success:function(data){
        for(i=0;i<data.length;i++){
          var dataApi = data[i];
          var kabkota_id = dataApi.kabkota_id;
          dataRisiko[kabkota_id] = L.marker([dataApi.latitude , dataApi.longitude]).addTo(map).bindPopup("<b>"+dataApi.nama_rs+"</b> <br />"+dataApi.alamat+"<br />"+dataApi.no_tlp);
        }
      }
    });
}
        
</script>
 