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
            <h5>{{ __('Visualisasi Pemetaan Tingkat Risiko Stunting Jawa Timur') }}</h5>
            <div class="dropdown">
              <button class="btn bg-gradient-primary btn-sm mb-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Tahun
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{route('peta2017')}}">2017</a></li>
                <li><a class="dropdown-item" href="{{route('peta2018')}}">2018</a></li>
                <li><a class="dropdown-item" href="{{route('peta2019')}}">2019</a></li>
                <li><a class="dropdown-item" href="{{route('peta2020')}}">2020</a></li>
                <li><a class="dropdown-item" href="{{route('peta2021')}}">2021</a></li>
              </ul>
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
	  	id: 'mapbox/streets-v11'
	});
  
  var map = L.map('map', {
        center: [-7.54409437100132, 112.20990556692459],
        zoom: 8,
        layers: [peta]
  });

</script>
