@include("web/layouts/partials/header")
<section class="main-content-wrapper" style="min-height: 122.487px;">     
<div class="row pt-1">
@include("web/layouts/partials/leftsidebar")
<div class="col-9 pl-0 hidden-xs slider-section-wrapper">
<div class="slider-section div-match-height slick-initialized slick-slider slick-dotted" style="min-height: 537.2px;">
	

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