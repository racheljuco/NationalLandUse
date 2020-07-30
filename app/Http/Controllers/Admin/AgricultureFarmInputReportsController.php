<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\District;
use App\Models\Village;
use App\Models\LandUsePlan;
use Excel;

class AgricultureFarmInputReportsController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::pluck('region_name','id')->all();
        return view('reports.agriculture.farminputs.create',compact('regions'));
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
                'district_id' => 'nullable|numeric',
            ]);
     
       
            if($request->has('district_id') && !empty($request->input('district_id'))){

              
            $region_name = Region::find($data['region_id'])->region_name;
            $district_name = District::find($data['district_id'])->district_name;
            $villages = Village::where('district_id',$data['district_id'])->pluck('id')->toArray();
            $title = "NATIONAL LAND USE PLANNING COMMISSION";
            $heading  = "FARM INPUTS (".strtoupper($region_name) . "-". strtoupper($district_name).")";
            $land_use_plans =  LandUsePlan::with('LandUseDistribution','Village')
                                //->where('land_use_plan_status_id',$data['land_use_plan_status_id'])//ask for status
                                ->whereIn('village_id',$villages)
                                ->get();
            return Excel::download(new \App\ExcelExports\FarmInputReport($land_use_plans,$heading,$title), 'farm_input_report.xlsx');
            }
            
    
          }catch(Exception $e){
    
            return "Oops Error Ocurred while generating report";
    
          }
    
        }
}
