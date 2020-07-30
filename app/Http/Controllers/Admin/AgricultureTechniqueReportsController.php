<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\District;
use App\Models\Village;
use App\Models\LandUsePlan;
use PDF;
use DB;

class AgricultureTechniqueReportsController extends Controller
{
          /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::pluck('region_name','id')->all();
        return view('reports.agriculture.techniques.create',compact('regions'));
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
                'district_id' => 'required|numeric',
                'village_id' => 'required|numeric',
            ]);
     
       
            if($request->has('village_id') && !empty($request->input('village_id'))){
            
                $region_name = Region::find($data['region_id'])->region_name;
                $district_name = District::find($data['district_id'])->district_name;
                $land_use_plan =  LandUsePlan::
                //->where('land_use_plan_status_id',$data['land_use_plan_status_id'])//ask for status
                where('village_id',$data['village_id'])
                ->first();

                $farming_techniques = $land_use_plan->farming_techniques;
                //dd($farming_methods);

                $title = "NATIONAL LAND USE PLANNING COMMISSION";
                $heading  = "FARMING TECHNIQUES -   (".strtoupper($region_name) . "-". strtoupper($district_name).")";  
        
            }

            $pdf = PDF::loadView('reports.agriculture.techniques.body',compact('heading','title','farming_techniques'),[],['orientation' => 'portrait']);
            $file_no = mt_rand(1, 99);
            return $pdf->stream('AgricultureTechniquesReport'.$file_no.'.pdf');
    
          }catch(Exception $e){
    
            return "Oops Error Ocurred while generating report";
    
          }
    
        }
}
