<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LupDataController extends Controller
{
   public function agriculture_index(){
 
       return view('admin.lup_data.agriculture.index');

   }

   public function livestock_index(){
     
    return view('admin.lup_data.livestock_fisheries.index');

   }

   public function resource_index(){
     
    return view('admin.lup_data.natural_resources.index');

   }

   public function water_index(){
        
        return view('admin.lup_data.water_resources.index');

    }

   public function physical_social_infastructure_index(){
        
        return view('admin.lup_data.physical_social.index');

    }

   public function stakeholder_index(){
        
        return view('admin.lup_data.stakeholders.index');

    }
}
