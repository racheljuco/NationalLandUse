<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\District;
use App\Models\Village;
use App\Models\LandUsePlan;
use App\Models\WildlifeCorridor;
use PDF;
use DB;
use Excel;


class WildlifeCorridorReportsController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $regions = Region::pluck('region_name','id')->all();
        return view('reports.natural_resources.wildlife_corridors.create',compact('regions'));
    }

    
    /**
     * Genarate Report.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        try{

            $data = $this->validate($request, [
                'level_id' => 'required|numeric',
                'region_id' => 'required|numeric',
                'district_id' => 'nullable|numeric'
            ]);
     
       
            if($request->has('district_id') && !empty($request->input('district_id'))){

              
            $region_name = Region::find($data['region_id'])->region_name;
            $district_name = District::find($data['district_id'])->district_name;
            $villages = Village::where('district_id',$data['district_id'])->pluck('id')->toArray();
            //dd($villages);
            $title = "NATIONAL LAND USE PLANNING COMMISSION";
            $heading  = "WILDLIFE CORRIDORS (".strtoupper($region_name) . "-". strtoupper($district_name).")";
           //dd($district_name);
            $land_use_plans =  WildlifeCorridor::with('Village')
                                //->where('land_use_plan_status_id',$data['land_use_plan_status_id'])//ask for status
                                ->whereIn('village_id',$villages)
                                ->get();

              $pdf = PDF::loadView('reports.natural_resources.wildlife_corridors.body',compact('heading','title','land_use_plans'),[],['orientation' => 'landscape']);
               $file_no = mt_rand(1, 99);
               return $pdf->stream('wildlifeCorridor'.$file_no.'.pdf');
                             
            }
            
            if($request->has('region_id') && !empty($request->input('region_id'))){
              $region = Region::find($data['region_id']);
              $region_name = $region->region_name;
              $districts_ids = $region->districts->pluck('id')->toArray();

              $villages = Village::whereIn('district_id',$districts_ids)->pluck('id')->toArray();
              //dd($villages);
              $title = "NATIONAL LAND USE PLANNING COMMISSION";
              $heading  = "WILDLIFE CORRIDORS (".strtoupper($region_name).")";
              $land_use_plans =  WildlifeCorridor::with('Village')
                                  //->where('land_use_plan_status_id',$data['land_use_plan_status_id'])//ask for status
                                  ->whereIn('village_id',$villages)
                                  ->get();
                                
               $pdf = PDF::loadView('reports.natural_resources.wildlife_corridors.body',compact('heading','title','land_use_plans'),[],['orientation' => 'landscape']);
               $file_no = mt_rand(1, 99);
               return $pdf->stream('wildlifeCorridor'.$file_no.'.pdf');
              }
            
     
            
           

          }catch(Exception $e){
    
            return "Oops Error Ocurred while generating report";
    
          }
    
        }
}
