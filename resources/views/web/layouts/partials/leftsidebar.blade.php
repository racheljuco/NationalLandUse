<div class="col-3 xs-full-width profile-section-wrapper">
<div class="profile-section div-match-height" style="min-height: 495.6px;">
<div class="profile col-12">
<div class="profile-body text-center">
<img src="{{asset('logo/emblem.png')}}" alt="emblem" width="50" height="50" class="img-fluid"> 
<a href="{{ route('web.home') }}"><p> HOME || NLUIS SERVICES</p></a>
</div>
</div>
<style>
button {
display: inline-block;
background-color: #315c72;
border-radius: 10px;
border: 4px double #cccccc;
color: #eeeeee;
text-align: center;
font-size: 20px;
padding: 18px;
width: 240px;
cursor: pointer;
margin: 5px;
}
</style>
<button onclick="window.location.href='{{ route('web.landuse_plan.landuseplan') }}';" type="button">Land Use Plan</button>
<button onclick="window.location.href='{{ route('web.landuse_reports.landuseR') }}';" type="button">Land Use Reports</button>
<button onclick="window.location.href='{{ route('web.landscape.landscape') }}';" type="button">Landscape</button>
<button onclick="window.location.href='{{ route('web.maps.map') }}';" type="button">Maps</button>
<button onclick="window.location.href='{{ route('admin.district.index') }}';" type="button">LOGIN</button>
</div>
<div></div>
</div>