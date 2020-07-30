<htmlpageheader name="letterheader">
<div id="images">
<div id="images">
<img class="logo" alt="TZ LOGO" src="logo/tz.jpg" style="max-height:100px;"/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
      <img class="logo" alt="NLUIS LOGO" src="logo/nluis.png" style="max-height:100px;"/>
      
</div>

  <div style="margin-top:1cm; text-align: center"><b>{{ $title }}</b></div>

  <div style="margin-top:1cm; text-align: center; border-top: 1px solid;  border-bottom: 1px solid">{{ $heading }}</div>

</htmlpageheader>

<htmlpagefooter name="letterfooter2">

    <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; font-family: sans-serif; ">
        This report was generated from Authorised Instititute on {DATE jS F Y} | Page {PAGENO} of {nbpg}
    </div>
</htmlpagefooter>


<style>
<?php $css = file_get_contents(public_path('mpdf/css/pdf_page.css')); echo $css; ?>
.logo {
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
}
#images{
   text-align:center;
}
</style>
