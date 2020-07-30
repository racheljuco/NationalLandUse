@include("web/layouts/partials/header")
<section class="main-content-wrapper" style="min-height: 122.487px;">     
<div class="row pt-1">
@include("web/layouts/partials/leftsidebar")
<div class="col-9 pl-0 hidden-xs slider-section-wrapper">
<div class="slider-section div-match-height slick-initialized slick-slider slick-dotted" style="min-height: 537.2px;">
<img class="mySlides" src="{{asset('images/Tanzania-map.jpg')}}" alt="ramani" style="width:60%">
<img class="mySlides" src="{{asset('images/Mpango_sample.png')}}" alt="mpango" style="width:60%">
<img class="mySlides" src="{{asset('images/Msowero_village_Kilosa.png')}}" alt="mpango" style="width:60%">
</div>
</div>
</div>
</section> 
</div>
@include("web/layouts/partials/footer") 
@include("web/layouts/partials/script")           

@yield("js")
@stack('script')
</body>
</html>