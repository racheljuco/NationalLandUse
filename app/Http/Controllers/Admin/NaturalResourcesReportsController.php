<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandUseplan;
use App\Models\Village;
use PDF;

class NaturalResourcesReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $land_use_plan = LandUsePlan::find(1);
        // $village = Village::find($land_use_plan->village_id);
 
        // $farming_methods = $land_use_plan->crops;


        // $title = "NATIONAL LAND USE PLANNING COMMISSION";
        // $heading  = "TYPES OF AGRICULTURE PRACTICES -  ". strtoupper($village->village_name)." VILLAGE";

        // $pdf = PDF::loadView('repdemo.body',compact('heading','title','farming_methods','land_use_plan'),[],['orientation' => 'portrait']);
        // $file_no = mt_rand(1, 99);
        // return $pdf->stream('landUseDistributionReport'.$file_no.'.pdf');
        //return 1;
        return view('admin.reports.natural_resources.index');
    }

 
}
