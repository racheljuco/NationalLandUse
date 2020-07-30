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


class WildlifeReportsController extends Controller
{
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::pluck('region_name','id')->all();
        return view('reports.natural_resources.wildlifes.create',compact('regions'));
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
                'wildlife_type_id' => 'required|numeric'
            ]);
     
       
            if($request->has('village_id') && !empty($request->input('village_id'))){
            
                $region_name = Region::find($data['region_id'])->region_name;
                $district_name = District::find($data['district_id'])->district_name;
                $land_use_plan =  LandUsePlan::
                //->where('land_use_plan_status_id',$data['land_use_plan_status_id'])//ask for status
                where('village_id',$data['village_id'])
                ->first();
               if($data['wildlife_type_id'] == 1){
                  $wildlifes = $land_use_plan->wildlifes()->where('type_wildlife_id',1)->get();
                 
               }
                
               else if($data['wildlife_type_id'] == 2){
                  $wildlifes = $land_use_plan->wildlifes()->where('type_wildlife_id',2)->get();
               }
               else{
                $wildlifes = $land_use_plan->wildlifes;
               }
                // dd($crops);

                $title = "NATIONAL LAND USE PLANNING COMMISSION";
                $heading  = "MAJOR WILDLIFES -   (".strtoupper($region_name) . "-". strtoupper($district_name).")";  
        
            }

            $pdf = PDF::loadView('reports.natural_resources.wildlifes.body',compact('heading','title','wildlifes'),[],['orientation' => 'portrait']);
            $file_no = mt_rand(1, 99);
            return $pdf->stream('AgricultureCropsReport'.$file_no.'.pdf');
    
          }catch(Exception $e){
    
            return "Oops Error Ocurred while generating report";
    
          }
    
        }

}
