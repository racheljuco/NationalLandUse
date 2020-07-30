<?php

namespace App\ExcelExports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LandDistributionReport implements FromView
{
    protected $data;
    protected $heading;
    protected $title;

    function __construct($data,$heading,$title) {

           $this->data = $data;
           $this->heading = $heading;
           $this->title = $title;
    }

    public function view(): View
    {
        $heading =  $this->heading;
        $title = $this->title;
        $land_use_plans = $this->data;
        
        return view('reports.land_use_distributions.excel.body',compact('heading','title','land_use_plans'));
    }




}
