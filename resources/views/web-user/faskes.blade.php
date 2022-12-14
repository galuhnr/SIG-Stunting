<div id="map" style="height: 480px;"></div>
 
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
 
<script>
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
          dataRisiko[kabkota_id] = L.marker([dataApi.latitude, dataApi.longitude]).addTo(map).bindPopup("<b>"+dataApi.nama_rs+"</b> <br />"+dataApi.alamat+dataApi.no_tlp);
        }
      }
    });
}
        
</script>
 