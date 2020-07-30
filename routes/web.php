<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Auth::routes();

//Route::redirect("/","/login");


Route::group(
     [
         'prefix' => '/',
     ], function () {
     
         Route::get('/', function(){
              return view("web.home");
         })
              ->name('web.home');
});
Route::group(
     [
         'prefix' => 'web/landuse_reports',
     ], function () {
     
         Route::get('/', function(){
              return view("web.landuse_reports.landuseR");
         })
              ->name('web.landuse_reports.landuseR');
});
Route::group(
     [
         'prefix' => 'web/maps',
     ], function () {
     
         Route::get('/', function(){
              return view("web.maps.map");
         })
              ->name('web.maps.map');
});
Route::group(
     [
         'prefix' => 'web/landuse_plan',
     ], function () {
     
         Route::get('/', function(){
              return view("web.landuse_plan.landuseplan");
         })
              ->name('web.landuse_plan.landuseplan');
});

Route::group(
     [
         'prefix' => 'web/landscape',
     ], function () {
     
         Route::get('/', function(){
              return view("web.landscape.landscape");
         })
              ->name('web.landscape.landscape');
});


Route::group(
     [
         'prefix' => 'admin/maps',
     ], function () {
     
         Route::get('/', function(){
              return view("admin.maps.index");
         })
              ->name('admin.map.index');
});

Route::group(
    [   'middleware' => ['auth'],
        'prefix' => 'admin',
    ], function () {

    Route::get('/landing', 'Admin\LandingController@index')
               ->name('landing');
});

 //Main Reports Controller
Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports',
     ], function () {
 
     Route::get('/', 'Admin\ReportsController@index')
                ->name('admin.report.index');
 });

  //Agriculture Reports Controller
Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/agriculture',
     ], function () {
 
     Route::get('/', 'Admin\AgricultureReportsController@index')
                ->name('admin.agri_report.index');

 });

   //LUP Data Controller
Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/lup-data',
     ], function () {
 
     Route::get('/agriculture', 'Admin\LupDataController@agriculture_index')
                ->name('admin.lup_agri.index');

     Route::get('/livestocks', 'Admin\LupDataController@livestock_index')
                ->name('admin.lup_liv.index');

     Route::get('/resources', 'Admin\LupDataController@resource_index')
                ->name('admin.lup_res.index');

    Route::get('/water', 'Admin\LupDataController@water_index')
                ->name('admin.lup_wate.index');

    Route::get('/physical_social', 'Admin\LupDataController@physical_social_infastructure_index')
                ->name('admin.lup_phys.index');

    Route::get('/stakeholders', 'Admin\LupDataController@stakeholder_index')
                ->name('admin.lup_stak.index');
 });


  //Agriculture Crops Report Controller
  Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/agriculture-crops',
     ], function () {
 
     Route::get('/', 'Admin\AgricultureCropReportsController@create')
                ->name('admin.agri_crop.report.create');

     Route::post('/report', 'Admin\AgricultureCropReportsController@report')
                ->name('admin.agri_crop.report.report');
 });

     //Agriculture Farm input Report Controller
     Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/agriculture-farm-inputs',
     ], function () {

     Route::get('/', 'Admin\AgricultureFarmInputReportsController@create')
                    ->name('admin.farm_input.report.create');

     Route::post('/report', 'Admin\AgricultureFarmInputReportsController@report')
                    ->name('admin.farm_input.report.report');
     });


   //Agriculture Tools Report Controller
   Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/agriculture-tools',
     ], function () {
 
     Route::get('/', 'Admin\AgricultureToolReportsController@create')
                ->name('admin.agri_tool.report.create');

     Route::post('/report', 'Admin\AgricultureToolReportsController@report')
                ->name('admin.agri_tool.report.report');
 });

    //Agriculture Practices Report Controller
    Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/agriculture-practices',
     ], function () {
 
     Route::get('/', 'Admin\AgriculturePracticeReportsController@create')
                ->name('admin.agri_practice.report.create');

     Route::post('/report', 'Admin\AgriculturePracticeReportsController@report')
                ->name('admin.agri_practice.report.report');
 });


    //Agriculture Techniques Report Controller
    Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/agriculture-techniques',
     ], function () {
 
     Route::get('/', 'Admin\AgricultureTechniqueReportsController@create')
                ->name('admin.agri_technique.report.create');

     Route::post('/report', 'Admin\AgricultureTechniqueReportsController@report')
                ->name('admin.agri_technique.report.report');
 });

// AgricultureIrrigatedPotentialAreaController Report Controller
     Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/agriculture-irrigated-potential-areas',
     ], function () {

     Route::get('/', 'Admin\AgricultureIrrigatedPotentialAreaReportsController@create')
                    ->name('admin.agri_irrigated_area.report.create');

     Route::post('/report', 'Admin\AgricultureIrrigatedPotentialAreaReportsController@report')
                    ->name('admin.agri_irrigated_area.report.report');
 });

 // AgricultureAreaIrrigationController Report Controller
 Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/agriculture-area-under-irrigation',
     ], function () {

     Route::get('/', 'Admin\AgricultureAreaIrrigationReportsController@create')
                    ->name('admin.area_under_irrigation.report.create');

     Route::post('/report', 'Admin\AgricultureAreaIrrigationReportsController@report')
                    ->name('admin.area_under_irrigation.report.report');
 });

  // AgricultureCultivatedLandYieldController Report Controller
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/cultivated_land_yield',
     ], function () {

     Route::get('/', 'Admin\AgricultureCultivatedLandYieldReportsController@create')
                    ->name('admin.cultivated_land_yield.report.create');

     Route::post('/report', 'Admin\AgricultureCultivatedLandYieldReportsController@report')
                    ->name('admin.cultivated_land_yield.report.report');
 });

 //Land Use Distribution Reports Controller
 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/land-use-distributions',
     ], function () {
 
     Route::get('/', 'Admin\LandUseDistributionReportsController@create')
                ->name('admin.land_use_distribution.report.create');

     Route::post('/report', 'Admin\LandUseDistributionReportsController@report')
                ->name('admin.land_use_distribution.report.report');
 });




Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/v2users',
     ], function () {
 
     Route::get('/', 'Admin\UsersDashboardController@index')
                ->name('admin.dashboard.user');
 });

 

 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/v2locations',
     ], function () {
 
     Route::get('/', 'Admin\LocationDashboardController@index')
                ->name('admin.dashboard.location');
 });

 

 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/v2landuseplans',
     ], function () {
 
     Route::get('/', 'Admin\LandUsePlanDashboardController@index')
                ->name('admin.dashboard.landuseplan');
                
 });
 

Route::group(
    [   'middleware' => ['auth'],
        'prefix' => 'admin/users',
    ], function () {

        Route::get('/', 'Admin\UsersController@index')
             ->name('admin.user.index');

        Route::get('/create','Admin\UsersController@create')
             ->name('admin.user.create');

        Route::get('/show/{user}','Admin\UsersController@show')
             ->name('admin.user.show')
             ->where('id', '[0-9]+');

        Route::get('/{user}/edit','Admin\UsersController@edit')
             ->name('admin.user.edit');

       Route::get('/{user}/edit_role','Admin\UsersController@edit_role')
            ->name('admin.user.edit_role');

        Route::post('/', 'Admin\UsersController@store')
             ->name('admin.user.store');

        Route::put('user/{user}', 'Admin\UsersController@update')
             ->name('admin.user.update');

         Route::put('user_role/{user}', 'Admin\UsersController@update_role')
              ->name('admin.user.update_role');

        Route::delete('/user/{user}','Admin\UsersController@destroy')
             ->name('admin.user.destroy');

        Route::get('/users','Admin\UsersController@getData')
            ->name('admin.user.data');

    });


    Route::group(
    [   'middleware' => ['auth'],
        'prefix' => 'admin/roles',
    ], function () {

        Route::get('/', 'Admin\RolesController@index')
             ->name('admin.role.index');

        Route::get('/create','Admin\RolesController@create')
             ->name('admin.role.create');

        Route::get('/show/{role}','Admin\RolesController@show')
             ->name('admin.role.show');

        Route::get('/{role}/edit','Admin\RolesController@edit')
             ->name('admin.role.edit');

        Route::post('/', 'Admin\RolesController@store')
             ->name('admin.role.store');

        Route::put('role/{role}', 'Admin\RolesController@update')
             ->name('admin.role.update');

        Route::delete('/role/{role}','Admin\RolesController@destroy')
             ->name('admin.role.destroy');

        Route::get('/roles','Admin\RolesController@getData')
              ->name('admin.role.data');

    });

    Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'admin/permissions',
    ], function () {

        Route::get('/', 'Admin\PermissionsController@index')
             ->name('admin.permission.index');

        Route::get('/create','Admin\PermissionsController@create')
             ->name('admin.permission.create');

        Route::get('/show/{permission}','Admin\PermissionsController@show')
             ->name('admin.permission.show');

        Route::get('/{permission}/edit','Admin\PermissionsController@edit')
             ->name('admin.permission.edit');

        Route::post('/', 'Admin\PermissionsController@store')
             ->name('admin.permission.store');

        Route::put('permission/{permission}', 'Admin\PermissionsController@update')
             ->name('admin.permission.update');

        Route::delete('/permission/{permission}','Admin\PermissionsController@destroy')
             ->name('admin.permission.destroy');

         Route::get('/permissions','Admin\PermissionsController@getData')
             ->name('admin.permission.data');

    });

Route::group(
[
    'prefix' => 'admin/regions',
], function () {

    Route::get('/', 'Admin\RegionsController@index')
         ->name('admin.region.index');

    Route::get('/create','Admin\RegionsController@create')
         ->name('admin.region.create');

    Route::get('/show/{region}','Admin\RegionsController@show')
         ->name('admin.region.show')
         ->where('id', '[0-9]+');

    Route::get('/{region}/edit','Admin\RegionsController@edit')
         ->name('admin.region.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\RegionsController@store')
         ->name('admin.region.store');
               
    Route::put('region/{region}', 'Admin\RegionsController@update')
         ->name('admin.region.update')
         ->where('id', '[0-9]+');

    Route::delete('/region/{region}','Admin\RegionsController@destroy')
         ->name('admin.region.destroy')
         ->where('id', '[0-9]+');

    Route::get('/getDistricts/{id}', 'Admin\RegionsController@getDistricts')
         ->name('admin.district.data')
         ->where('id', '[0-9]+');


});

Route::group(
[
    'prefix' => 'admin/districts',
], function () {

    Route::get('/', 'Admin\DistrictsController@index')
         ->name('admin.district.index');

    Route::get('/create','Admin\DistrictsController@create')
         ->name('admin.district.create');

    Route::get('/show/{district}','Admin\DistrictsController@show')
         ->name('admin.district.show')
         ->where('id', '[0-9]+');

    Route::get('/{district}/edit','Admin\DistrictsController@edit')
         ->name('admin.district.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\DistrictsController@store')
         ->name('admin.district.store');
               
    Route::put('district/{district}', 'Admin\DistrictsController@update')
         ->name('admin.district.update')
         ->where('id', '[0-9]+');

    Route::delete('/district/{district}','Admin\DistrictsController@destroy')
         ->name('admin.district.destroy')
         ->where('id', '[0-9]+');

    Route::get('/getVillages/{id}', 'Admin\DistrictsController@getVillages')
        ->name('admin.village.data')
        ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/wards',
], function () {

    Route::get('/', 'Admin\WardsController@index')
         ->name('admin.ward.index');

    Route::get('/create','Admin\WardsController@create')
         ->name('admin.ward.create');

    Route::get('/show/{ward}','Admin\WardsController@show')
         ->name('admin.ward.show')
         ->where('id', '[0-9]+');

    Route::get('/{ward}/edit','Admin\WardsController@edit')
         ->name('admin.ward.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\WardsController@store')
         ->name('admin.ward.store');
               
    Route::put('ward/{ward}', 'Admin\WardsController@update')
         ->name('admin.ward.update')
         ->where('id', '[0-9]+');

    Route::delete('/ward/{ward}','Admin\WardsController@destroy')
         ->name('admin.ward.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/villages',
], function () {

    Route::get('/', 'Admin\VillagesController@index')
         ->name('admin.village.index');

    Route::get('/create','Admin\VillagesController@create')
         ->name('admin.village.create');

    Route::get('/show/{village}','Admin\VillagesController@show')
         ->name('admin.village.show')
         ->where('id', '[0-9]+');

    Route::get('/{village}/edit','Admin\VillagesController@edit')
         ->name('admin.village.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\VillagesController@store')
         ->name('admin.village.store');
               
    Route::put('village/{village}', 'Admin\VillagesController@update')
         ->name('admin.village.update')
         ->where('id', '[0-9]+');

    Route::delete('/village/{village}','Admin\VillagesController@destroy')
         ->name('admin.village.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
     [
         'prefix' => 'admin/hamlets',
     ], function () {
     
         Route::get('/', 'Admin\HamletsController@index')
              ->name('admin.hamlet.index');
     
         Route::get('/create','Admin\HamletsController@create')
              ->name('admin.hamlet.create');
     
         Route::get('/show/{hamlet}','Admin\HamletsController@show')
              ->name('admin.hamlet.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{hamlet}/edit','Admin\HamletsController@edit')
              ->name('admin.hamlet.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\HamletsController@store')
              ->name('admin.hamlet.store');
                    
         Route::put('hamlet/{hamlet}', 'Admin\HamletsController@update')
              ->name('admin.hamlet.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/hamlet/{hamlet}','Admin\HamletsController@destroy')
              ->name('admin.hamlet.destroy')
              ->where('id', '[0-9]+');
     
     });
     

Route::group(
[
    'prefix' => 'admin/wards',
], function () {

    Route::get('/', 'Admin\WardsController@index')
         ->name('admin.ward.index');

    Route::get('/create','Admin\WardsController@create')
         ->name('admin.ward.create');

    Route::get('/show/{ward}','Admin\WardsController@show')
         ->name('admin.ward.show')
         ->where('id', '[0-9]+');

    Route::get('/{ward}/edit','Admin\WardsController@edit')
         ->name('admin.ward.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\WardsController@store')
         ->name('admin.ward.store');
               
    Route::put('ward/{ward}', 'Admin\WardsController@update')
         ->name('admin.ward.update')
         ->where('id', '[0-9]+');

    Route::delete('/ward/{ward}','Admin\WardsController@destroy')
         ->name('admin.ward.destroy')
         ->where('id', '[0-9]+');

});





Route::group(
[
    'prefix' => 'admin/land-use-plans',
], function () {

    Route::get('/', 'Admin\LandUsePlansController@index')
         ->name('admin.land_use_plan.index');

    Route::get('/create','Admin\LandUsePlansController@create')
         ->name('admin.land_use_plan.create');

    Route::get('/show/{landUsePlan}','Admin\LandUsePlansController@show')
         ->name('admin.land_use_plan.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUsePlan}/edit','Admin\LandUsePlansController@edit')
         ->name('admin.land_use_plan.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUsePlansController@store')
         ->name('admin.land_use_plan.store');
               
    Route::put('land_use_plan/{landUsePlan}', 'Admin\LandUsePlansController@update')
         ->name('admin.land_use_plan.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_plan/{landUsePlan}','Admin\LandUsePlansController@destroy')
         ->name('admin.land_use_plan.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/land-use-distributions',
], function () {

    Route::get('/', 'Admin\LandUseDistributionsController@index')
         ->name('admin.land_use_distribution.index');

    Route::get('/create','Admin\LandUseDistributionsController@create')
         ->name('admin.land_use_distribution.create');

    Route::get('/show/{landUseDistribution}','Admin\LandUseDistributionsController@show')
         ->name('admin.land_use_distribution.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUseDistribution}/edit','Admin\LandUseDistributionsController@edit')
         ->name('admin.land_use_distribution.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUseDistributionsController@store')
         ->name('admin.land_use_distribution.store');
               
    Route::put('land_use_distribution/{landUseDistribution}', 'Admin\LandUseDistributionsController@update')
         ->name('admin.land_use_distribution.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_distribution/{landUseDistribution}','Admin\LandUseDistributionsController@destroy')
         ->name('admin.land_use_distribution.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\LandUsePlanStatusesController@index')
         ->name('admin.land_use_plan_status.index');

    Route::get('/create','Admin\LandUsePlanStatusesController@create')
         ->name('admin.land_use_plan_status.create');

    Route::get('/show/{landUsePlanStatus}','Admin\LandUsePlanStatusesController@show')
         ->name('admin.land_use_plan_status.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUsePlanStatus}/edit','Admin\LandUsePlanStatusesController@edit')
         ->name('admin.land_use_plan_status.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUsePlanStatusesController@store')
         ->name('admin.land_use_plan_status.store');
               
    Route::put('land_use_plan_status/{landUsePlanStatus}', 'Admin\LandUsePlanStatusesController@update')
         ->name('admin.land_use_plan_status.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_plan_status/{landUsePlanStatus}','Admin\LandUsePlanStatusesController@destroy')
         ->name('admin.land_use_plan_status.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\GazettesController@index')
         ->name('admin.gazette.index');

    Route::get('/create','Admin\GazettesController@create')
         ->name('admin.gazette.create');

    Route::get('/show/{gazette}','Admin\GazettesController@show')
         ->name('admin.gazette.show')
         ->where('id', '[0-9]+');

    Route::get('/{gazette}/edit','Admin\GazettesController@edit')
         ->name('admin.gazette.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\GazettesController@store')
         ->name('admin.gazette.store');
               
    Route::put('gazette/{gazette}', 'Admin\GazettesController@update')
         ->name('admin.gazette.update')
         ->where('id', '[0-9]+');

    Route::delete('/gazette/{gazette}','Admin\GazettesController@destroy')
         ->name('admin.gazette.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/shape-files',
], function () {

    Route::get('/', 'Admin\ShapeFilesController@index')
         ->name('admin.shape_file.index');

    Route::get('/create','Admin\ShapeFilesController@create')
         ->name('admin.shape_file.create');

    Route::get('/show/{shapeFile}','Admin\ShapeFilesController@show')
         ->name('admin.shape_file.show')
         ->where('id', '[0-9]+');

    Route::get('/{shapeFile}/edit','Admin\ShapeFilesController@edit')
         ->name('admin.shape_file.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\ShapeFilesController@store')
         ->name('admin.shape_file.store');
               
    Route::put('shape_file/{shapeFile}', 'Admin\ShapeFilesController@update')
         ->name('admin.shape_file.update')
         ->where('id', '[0-9]+');

    Route::delete('/shape_file/{shapeFile}','Admin\ShapeFilesController@destroy')
         ->name('admin.shape_file.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\FarmingMethodsController@index')
         ->name('admin.farming_method.index');

    Route::get('/create','Admin\FarmingMethodsController@create')
         ->name('admin.farming_method.create');

    Route::get('/show/{farmingMethod}','Admin\FarmingMethodsController@show')
         ->name('admin.farming_method.show')
         ->where('id', '[0-9]+');

    Route::get('/{farmingMethod}/edit','Admin\FarmingMethodsController@edit')
         ->name('admin.farming_method.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\FarmingMethodsController@store')
         ->name('admin.farming_method.store');
               
    Route::put('farming_method/{farmingMethod}', 'Admin\FarmingMethodsController@update')
         ->name('admin.farming_method.update')
         ->where('id', '[0-9]+');

    Route::delete('/farming_method/{farmingMethod}','Admin\FarmingMethodsController@destroy')
         ->name('admin.farming_method.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\FarmingSystemsController@index')
         ->name('admin.farming_system.index');

    Route::get('/create','Admin\FarmingSystemsController@create')
         ->name('admin.farming_system.create');

    Route::get('/show/{farmingSystem}','Admin\FarmingSystemsController@show')
         ->name('admin.farming_system.show')
         ->where('id', '[0-9]+');

    Route::get('/{farmingSystem}/edit','Admin\FarmingSystemsController@edit')
         ->name('admin.farming_system.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\FarmingSystemsController@store')
         ->name('admin.farming_system.store');
               
    Route::put('farming_system/{farmingSystem}', 'Admin\FarmingSystemsController@update')
         ->name('admin.farming_system.update')
         ->where('id', '[0-9]+');

    Route::delete('/farming_system/{farmingSystem}','Admin\FarmingSystemsController@destroy')
         ->name('admin.farming_system.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\HarvestingMethodsController@index')
         ->name('admin.harvesting_method.index');

    Route::get('/create','Admin\HarvestingMethodsController@create')
         ->name('admin.harvesting_method.create');

    Route::get('/show/{harvestingMethod}','Admin\HarvestingMethodsController@show')
         ->name('admin.harvesting_method.show')
         ->where('id', '[0-9]+');

    Route::get('/{harvestingMethod}/edit','Admin\HarvestingMethodsController@edit')
         ->name('admin.harvesting_method.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\HarvestingMethodsController@store')
         ->name('admin.harvesting_method.store');
               
    Route::put('harvesting_method/{harvestingMethod}', 'Admin\HarvestingMethodsController@update')
         ->name('admin.harvesting_method.update')
         ->where('id', '[0-9]+');

    Route::delete('/harvesting_method/{harvestingMethod}','Admin\HarvestingMethodsController@destroy')
         ->name('admin.harvesting_method.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\FarmingMarketsController@index')
         ->name('admin.farming_market.index');

    Route::get('/create','Admin\FarmingMarketsController@create')
         ->name('admin.farming_market.create');

    Route::get('/show/{farmingMarket}','Admin\FarmingMarketsController@show')
         ->name('admin.farming_market.show')
         ->where('id', '[0-9]+');

    Route::get('/{farmingMarket}/edit','Admin\FarmingMarketsController@edit')
         ->name('admin.farming_market.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\FarmingMarketsController@store')
         ->name('admin.farming_market.store');
               
    Route::put('farming_market/{farmingMarket}', 'Admin\FarmingMarketsController@update')
         ->name('admin.farming_market.update')
         ->where('id', '[0-9]+');

    Route::delete('/farming_market/{farmingMarket}','Admin\FarmingMarketsController@destroy')
         ->name('admin.farming_market.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\CropTypesController@index')
         ->name('admin.crop_type.index');

    Route::get('/create','Admin\CropTypesController@create')
         ->name('admin.crop_type.create');

    Route::get('/show/{cropType}','Admin\CropTypesController@show')
         ->name('admin.crop_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{cropType}/edit','Admin\CropTypesController@edit')
         ->name('admin.crop_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\CropTypesController@store')
         ->name('admin.crop_type.store');
               
    Route::put('crop_type/{cropType}', 'Admin\CropTypesController@update')
         ->name('admin.crop_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/crop_type/{cropType}','Admin\CropTypesController@destroy')
         ->name('admin.crop_type.destroy')
         ->where('id', '[0-9]+');

});


Route::group(
[
    'prefix' => 'admin/crops',
], function () {

    Route::get('/', 'Admin\CropsController@index')
         ->name('admin.crop.index');

    Route::get('/create','Admin\CropsController@create')
         ->name('admin.crop.create');

    Route::get('/show/{crop}','Admin\CropsController@show')
         ->name('admin.crop.show')
         ->where('id', '[0-9]+');

    Route::get('/{crop}/edit','Admin\CropsController@edit')
         ->name('admin.crop.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\CropsController@store')
         ->name('admin.crop.store');
               
    Route::put('crop/{crop}', 'Admin\CropsController@update')
         ->name('admin.crop.update')
         ->where('id', '[0-9]+');

    Route::delete('/crop/{crop}','Admin\CropsController@destroy')
         ->name('admin.crop.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/land_plan-use-crops',
], function () {

    Route::get('/', 'Admin\LandUsePlanCropsController@index')
         ->name('admin.land_use_plan_crop.index');

    Route::get('/create','Admin\LandUsePlanCropsController@create')
         ->name('admin.land_use_plan_crop.create');

    Route::get('/show/{landUsePlanCrop}','Admin\LandUsePlanCropsController@show')
         ->name('admin.land_use_plan_crop.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUsePlanCrop}/edit','Admin\LandUsePlanCropsController@edit')
         ->name('admin.land_use_plan_crop.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUsePlanCropsController@store')
         ->name('admin.land_use_plan_crop.store');
               
    Route::put('land_use_plan_crop/{landUsePlanCrop}', 'Admin\LandUsePlanCropsController@update')
         ->name('admin.land_use_plan_crop.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_plan_crop/{landUsePlanCrop}','Admin\LandUsePlanCropsController@destroy')
         ->name('admin.land_use_plan_crop.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/farming-methods',
], function () {

    Route::get('/', 'Admin\FarmingMethodsController@index')
         ->name('admin.farming_method.index');

    Route::get('/create','Admin\FarmingMethodsController@create')
         ->name('admin.farming_method.create');

    Route::get('/show/{farmingMethod}','Admin\FarmingMethodsController@show')
         ->name('admin.farming_method.show')
         ->where('id', '[0-9]+');

    Route::get('/{farmingMethod}/edit','Admin\FarmingMethodsController@edit')
         ->name('admin.farming_method.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\FarmingMethodsController@store')
         ->name('admin.farming_method.store');
               
    Route::put('farming_method/{farmingMethod}', 'Admin\FarmingMethodsController@update')
         ->name('admin.farming_method.update')
         ->where('id', '[0-9]+');

    Route::delete('/farming_method/{farmingMethod}','Admin\FarmingMethodsController@destroy')
         ->name('admin.farming_method.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/land_use_plan_farming_method',
], function () {

    Route::get('/', 'Admin\LandUsePlanFarmingMethodsController@index')
         ->name('admin.land_use_plan_farming_method.index');

    Route::get('/create','Admin\LandUsePlanFarmingMethodsController@create')
         ->name('admin.land_use_plan_farming_method.create');

    Route::get('/show/{landUsePlanFarmingMethod}','Admin\LandUsePlanFarmingMethodsController@show')
         ->name('admin.land_use_plan_farming_method.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUsePlanFarmingMethod}/edit','Admin\LandUsePlanFarmingMethodsController@edit')
         ->name('admin.land_use_plan_farming_method.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUsePlanFarmingMethodsController@store')
         ->name('admin.land_use_plan_farming_method.store');
               
    Route::put('land_use_plan_farming_method/{landUsePlanFarmingMethod}', 'Admin\LandUsePlanFarmingMethodsController@update')
         ->name('admin.land_use_plan_farming_method.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_plan_farming_method/{landUsePlanFarmingMethod}','Admin\LandUsePlanFarmingMethodsController@destroy')
         ->name('admin.land_use_plan_farming_method.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/land_use_plan_farming_practice',
], function () {

    Route::get('/', 'Admin\LandUsePlanFarmingPracticesController@index')
         ->name('admin.land_use_plan_farming_practice.index');

    Route::get('/create','Admin\LandUsePlanFarmingPracticesController@create')
         ->name('admin.land_use_plan_farming_practice.create');

    Route::get('/show/{landUsePlanFarmingPractice}','Admin\LandUsePlanFarmingPracticesController@show')
         ->name('admin.land_use_plan_farming_practice.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUsePlanFarmingPractice}/edit','Admin\LandUsePlanFarmingPracticesController@edit')
         ->name('admin.land_use_plan_farming_practice.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUsePlanFarmingPracticesController@store')
         ->name('admin.land_use_plan_farming_practice.store');
               
    Route::put('land_use_plan_farming_practice/{landUsePlanFarmingPractice}', 'Admin\LandUsePlanFarmingPracticesController@update')
         ->name('admin.land_use_plan_farming_practice.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_plan_farming_practice/{landUsePlanFarmingPractice}','Admin\LandUsePlanFarmingPracticesController@destroy')
         ->name('admin.land_use_plan_farming_practice.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/land_use_plan_farming_technique',
], function () {

    Route::get('/', 'Admin\LandUsePlanFarmingTechniquesController@index')
         ->name('admin.land_use_plan_farming_technique.index');

    Route::get('/create','Admin\LandUsePlanFarmingTechniquesController@create')
         ->name('admin.land_use_plan_farming_technique.create');

    Route::get('/show/{landUsePlanFarmingTechnique}','Admin\LandUsePlanFarmingTechniquesController@show')
         ->name('admin.land_use_plan_farming_technique.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUsePlanFarmingTechnique}/edit','Admin\LandUsePlanFarmingTechniquesController@edit')
         ->name('admin.land_use_plan_farming_technique.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUsePlanFarmingTechniquesController@store')
         ->name('admin.land_use_plan_farming_technique.store');
               
    Route::put('land_use_plan_farming_technique/{landUsePlanFarmingTechnique}', 'Admin\LandUsePlanFarmingTechniquesController@update')
         ->name('admin.land_use_plan_farming_technique.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_plan_farming_technique/{landUsePlanFarmingTechnique}','Admin\LandUsePlanFarmingTechniquesController@destroy')
         ->name('admin.land_use_plan_farming_technique.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\FarmingPracticesController@index')
         ->name('admin.farming_practice.index');

    Route::get('/create','Admin\FarmingPracticesController@create')
         ->name('admin.farming_practice.create');

    Route::get('/show/{farmingPractice}','Admin\FarmingPracticesController@show')
         ->name('admin.farming_practice.show')
         ->where('id', '[0-9]+');

    Route::get('/{farmingPractice}/edit','Admin\FarmingPracticesController@edit')
         ->name('admin.farming_practice.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\FarmingPracticesController@store')
         ->name('admin.farming_practice.store');
               
    Route::put('farming_practice/{farmingPractice}', 'Admin\FarmingPracticesController@update')
         ->name('admin.farming_practice.update')
         ->where('id', '[0-9]+');

    Route::delete('/farming_practice/{farmingPractice}','Admin\FarmingPracticesController@destroy')
         ->name('admin.farming_practice.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\FarmingTechniquesController@index')
         ->name('admin.farming_technique.index');

    Route::get('/create','Admin\FarmingTechniquesController@create')
         ->name('admin.farming_technique.create');

    Route::get('/show/{farmingTechnique}','Admin\FarmingTechniquesController@show')
         ->name('admin.farming_technique.show')
         ->where('id', '[0-9]+');

    Route::get('/{farmingTechnique}/edit','Admin\FarmingTechniquesController@edit')
         ->name('admin.farming_technique.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\FarmingTechniquesController@store')
         ->name('admin.farming_technique.store');
               
    Route::put('farming_technique/{farmingTechnique}', 'Admin\FarmingTechniquesController@update')
         ->name('admin.farming_technique.update')
         ->where('id', '[0-9]+');

    Route::delete('/farming_technique/{farmingTechnique}','Admin\FarmingTechniquesController@destroy')
         ->name('admin.farming_technique.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin',
], function () {

    Route::get('/', 'Admin\FarmInputsController@index')
         ->name('admin.farm_input.index');

    Route::get('/create','Admin\FarmInputsController@create')
         ->name('admin.farm_input.create');

    Route::get('/show/{farmInput}','Admin\FarmInputsController@show')
         ->name('admin.farm_input.show')
         ->where('id', '[0-9]+');

    Route::get('/{farmInput}/edit','Admin\FarmInputsController@edit')
         ->name('admin.farm_input.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\FarmInputsController@store')
         ->name('admin.farm_input.store');
               
    Route::put('farm_input/{farmInput}', 'Admin\FarmInputsController@update')
         ->name('admin.farm_input.update')
         ->where('id', '[0-9]+');

    Route::delete('/farm_input/{farmInput}','Admin\FarmInputsController@destroy')
         ->name('admin.farm_input.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/land_use_plan_farm_input',
], function () {

    Route::get('/', 'Admin\LandUsePlanFarmInputsController@index')
         ->name('admin.land_use_plan_farm_input.index');

    Route::get('/create','Admin\LandUsePlanFarmInputsController@create')
         ->name('admin.land_use_plan_farm_input.create');

    Route::get('/show/{landUsePlanFarmInput}','Admin\LandUsePlanFarmInputsController@show')
         ->name('admin.land_use_plan_farm_input.show')
         ->where('id', '[0-9]+');

    Route::get('/{landUsePlanFarmInput}/edit','Admin\LandUsePlanFarmInputsController@edit')
         ->name('admin.land_use_plan_farm_input.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\LandUsePlanFarmInputsController@store')
         ->name('admin.land_use_plan_farm_input.store');
               
    Route::put('land_use_plan_farm_input/{landUsePlanFarmInput}', 'Admin\LandUsePlanFarmInputsController@update')
         ->name('admin.land_use_plan_farm_input.update')
         ->where('id', '[0-9]+');

    Route::delete('/land_use_plan_farm_input/{landUsePlanFarmInput}','Admin\LandUsePlanFarmInputsController@destroy')
         ->name('admin.land_use_plan_farm_input.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/organisations',
], function () {

    Route::get('/', 'Admin\OrganisationsController@index')
         ->name('admin.organisation.index');

    Route::get('/create','Admin\OrganisationsController@create')
         ->name('admin.organisation.create');

    Route::get('/show/{organisation}','Admin\OrganisationsController@show')
         ->name('admin.organisation.show')
         ->where('id', '[0-9]+');

    Route::get('/{organisation}/edit','Admin\OrganisationsController@edit')
         ->name('admin.organisation.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\OrganisationsController@store')
         ->name('admin.organisation.store');
               
    Route::put('organisation/{organisation}', 'Admin\OrganisationsController@update')
         ->name('admin.organisation.update')
         ->where('id', '[0-9]+');

    Route::delete('/organisation/{organisation}','Admin\OrganisationsController@destroy')
         ->name('admin.organisation.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/area_under_irrigation',
], function () {

    Route::get('/', 'Admin\AreaUnderIrrigationsController@index')
         ->name('admin.area_under_irrigation.index');

    Route::get('/create','Admin\AreaUnderIrrigationsController@create')
         ->name('admin.area_under_irrigation.create');

    Route::get('/show/{areaUnderIrrigation}','Admin\AreaUnderIrrigationsController@show')
         ->name('admin.area_under_irrigation.show')
         ->where('id', '[0-9]+');

    Route::get('/{areaUnderIrrigation}/edit','Admin\AreaUnderIrrigationsController@edit')
         ->name('admin.area_under_irrigation.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\AreaUnderIrrigationsController@store')
         ->name('admin.area_under_irrigation.store');
               
    Route::put('area_under_irrigation/{areaUnderIrrigation}', 'Admin\AreaUnderIrrigationsController@update')
         ->name('admin.area_under_irrigation.update')
         ->where('id', '[0-9]+');

    Route::delete('/area_under_irrigation/{areaUnderIrrigation}','Admin\AreaUnderIrrigationsController@destroy')
         ->name('admin.area_under_irrigation.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/irrigated_potential_area',
], function () {

    Route::get('/', 'Admin\IrrigatedPotentialAreasController@index')
         ->name('admin.irrigated_potential_area.index');

    Route::get('/create','Admin\IrrigatedPotentialAreasController@create')
         ->name('admin.irrigated_potential_area.create');

    Route::get('/show/{irrigatedPotentialArea}','Admin\IrrigatedPotentialAreasController@show')
         ->name('admin.irrigated_potential_area.show')
         ->where('id', '[0-9]+');

    Route::get('/{irrigatedPotentialArea}/edit','Admin\IrrigatedPotentialAreasController@edit')
         ->name('admin.irrigated_potential_area.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\IrrigatedPotentialAreasController@store')
         ->name('admin.irrigated_potential_area.store');
               
    Route::put('irrigated_potential_area/{irrigatedPotentialArea}', 'Admin\IrrigatedPotentialAreasController@update')
         ->name('admin.irrigated_potential_area.update')
         ->where('id', '[0-9]+');

    Route::delete('/irrigated_potential_area/{irrigatedPotentialArea}','Admin\IrrigatedPotentialAreasController@destroy')
         ->name('admin.irrigated_potential_area.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'admin/cultivated_land_yield',
], function () {

    Route::get('/', 'Admin\CultivatedLandYieldsController@index')
         ->name('admin.cultivated_land_yield.index');

    Route::get('/create','Admin\CultivatedLandYieldsController@create')
         ->name('admin.cultivated_land_yield.create');

    Route::get('/show/{cultivatedLandYield}','Admin\CultivatedLandYieldsController@show')
         ->name('admin.cultivated_land_yield.show')
         ->where('id', '[0-9]+');

    Route::get('/{cultivatedLandYield}/edit','Admin\CultivatedLandYieldsController@edit')
         ->name('admin.cultivated_land_yield.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'Admin\CultivatedLandYieldsController@store')
         ->name('admin.cultivated_land_yield.store');
               
    Route::put('cultivated_land_yield/{cultivatedLandYield}', 'Admin\CultivatedLandYieldsController@update')
         ->name('admin.cultivated_land_yield.update')
         ->where('id', '[0-9]+');

    Route::delete('/cultivated_land_yield/{cultivatedLandYield}','Admin\CultivatedLandYieldsController@destroy')
         ->name('admin.cultivated_land_yield.destroy')
         ->where('id', '[0-9]+');

});




 /*
   
    CREATED BY ALFRED
    DATE: 20/07/2020
 
 */

 //livestock and Fisheries Routes
 //Livestock and Fish directed Reports Controller::LivestockFisheriesReportsController
 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/livestock_fisheries',
     ], function () {
 
     Route::get('/', 'Admin\LivestockFisheriesReportsController@index')
                ->name('admin.generallivestockfish_report.index');

 });

  //Livestocks Report Controller :: controllerName:LivestockReportsController
  Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/livestock',
     ], function () {
 
     Route::get('/', 'Admin\LivestockReportsController@create')
                ->name('admin.livestock.report.create');

     Route::post('/report', 'Admin\LivestockReportsController@report')
                ->name('admin.livestock.report.report');
 });

// LivestocProjectionController Report Controller
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/livestock_projection',
     ], function () {

     Route::get('/', 'Admin\LivestockProjectionReportsController@create')
                    ->name('admin.livestock_projection.report.create');

     Route::post('/report', 'Admin\LivestockProjectionReportsController@report')
                    ->name('admin.livestock_projection.report.report');
 });

// LivestockKeepersController Report Controller
Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/livestock_keeper',
     ], function () {

     Route::get('/', 'Admin\LivestockKeeperReportsController@create')
                    ->name('admin.livestock_keeper.report.create');

     Route::post('/report', 'Admin\LivestockKeeperReportsController@report')
                    ->name('admin.livestock_keeper.report.report');
 });

// LivestockProductsController Report Controller
Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/livestock_product',
     ], function () {

     Route::get('/', 'Admin\LivestockProductReportsController@create')
                    ->name('admin.livestock_product.report.create');

     Route::post('/report', 'Admin\LivestockProductReportsController@report')
                    ->name('admin.livestock_product.report.report');
 });

// CattleDistributionsController Report Controller
Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/cattle_distribution',
     ], function () {

     Route::get('/', 'Admin\CattleDistributionReportsController@create')
                    ->name('admin.cattle_distribution.report.create');

     Route::post('/report', 'Admin\CattleDistributionReportsController@report')
                    ->name('admin.cattle_distribution.report.report');
 });

// CattleKeepersController Report Controller
Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/cattle_keeper',
     ], function () {

     Route::get('/', 'Admin\CattleKeeperReportsController@create')
                    ->name('admin.cattle_keeper.report.create');

     Route::post('/report', 'Admin\CattleKeeperReportsController@report')
                    ->name('admin.cattle_keeper.report.report');
 });


// GrazingLandsController Report Controller
Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/grazzing_land',
     ], function () {

     Route::get('/', 'Admin\GrazingLandReportsController@create')
                    ->name('admin.grazzing_land.report.create');

     Route::post('/report', 'Admin\GrazingLandReportsController@report')
                    ->name('admin.grazzing_land.report.report');
 });

// DiaryKeepersController Report Controller
Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/diary_keeper',
     ], function () {

     Route::get('/', 'Admin\DiaryKeeperReportsController@create')
                    ->name('admin.diary_keeper.report.create');

     Route::post('/report', 'Admin\DiaryKeeperReportsController@report')
                    ->name('admin.diary_keeper.report.report');
 });


// VeterinaryFacilityservicesController Report Controller
Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/veterinary_facilityservice',
     ], function () {

     Route::get('/', 'Admin\VeterinaryFacilityserviceReportsController@create')
                    ->name('admin.veterinary_facilityservice.report.create');

     Route::post('/report', 'Admin\VeterinaryFacilityserviceReportsController@report')
                    ->name('admin.veterinary_facilityservice.report.report');
 });


//LIVESTOCK
Route::group(
     [
         'prefix' => 'admin/livestocks',
     ], function () {
     
         Route::get('/', 'Admin\LivestocksController@index')
              ->name('admin.livestock.index');
     
         Route::get('/create','Admin\LivestocksController@create')
              ->name('admin.livestock.create');
     
         Route::get('/show/{livestock}','Admin\LivestocksController@show')
              ->name('admin.livestock.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{livestock}/edit','Admin\LivestocksController@edit')
              ->name('admin.livestock.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\LivestocksController@store')
              ->name('admin.livestock.store');
                    
         Route::put('livestock/{livestock}', 'Admin\LivestocksController@update')
              ->name('admin.livestock.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/livestock/{livestock}','Admin\LivestocksController@destroy')
              ->name('admin.livestock.destroy')
              ->where('id', '[0-9]+');
     
     });
     
     Route::group(
     [
         'prefix' => 'admin/land_plan-use-livestocks',
     ], function () {
     
         Route::get('/', 'Admin\LandUsePlanLivestocksController@index')
              ->name('admin.land_use_plan_livestock.index');
     
         Route::get('/create','Admin\LandUsePlanLivestocksController@create')
              ->name('admin.land_use_plan_livestock.create');
     
         Route::get('/show/{landUsePlanLivestock}','Admin\LandUsePlanLivestocksController@show')
              ->name('admin.land_use_plan_livestock.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{landUsePlanLivestock}/edit','Admin\LandUsePlanLivestocksController@edit')
              ->name('admin.land_use_plan_livestock.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\LandUsePlanLivestocksController@store')
              ->name('admin.land_use_plan_livestock.store');
                    
         Route::put('land_use_plan_livestock/{landUsePlanLivestock}', 'Admin\LandUsePlanLivestocksController@update')
              ->name('admin.land_use_plan_livestock.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/land_use_plan_livestock/{landUsePlanLivestock}','Admin\LandUsePlanLivestocksController@destroy')
              ->name('admin.land_use_plan_livestock.destroy')
              ->where('id', '[0-9]+');
     
     });

//Livestock_projection
     Route::group(      
          [
              'prefix' => 'admin/livestock_projection',
          ], function () {
          
              Route::get('/', 'Admin\LivestockProjectionsController@index')
                   ->name('admin.livestock_projection.index');
          
              Route::get('/create','Admin\LivestockProjectionsController@create')
                   ->name('admin.livestock_projection.create');
          
              Route::get('/show/{livestockProjection}','Admin\LivestockProjectionsController@show')
                   ->name('admin.livestock_projection.show')
                   ->where('id', '[0-9]+');
          
              Route::get('/{livestockProjection}/edit','Admin\LivestockProjectionsController@edit')
                   ->name('admin.livestock_projection.edit')
                   ->where('id', '[0-9]+');
          
              Route::post('/', 'Admin\LivestockProjectionsController@store')
                   ->name('admin.livestock_projection.store');
                         
              Route::put('livestock_projection/{livestockProjection}', 'Admin\LivestockProjectionsController@update')
                   ->name('admin.livestock_projection.update')
                   ->where('id', '[0-9]+');
          
              Route::delete('/livestock_projection/{livestockProjection}','Admin\LivestockProjectionsController@destroy')
                   ->name('admin.livestock_projection.destroy')
                   ->where('id', '[0-9]+');
          
          });

//Diary_keeper
          Route::group(
               [
                   'prefix' => 'admin/diary_keeper',
               ], function () {
               
                   Route::get('/', 'Admin\DiaryKeepersController@index')
                        ->name('admin.diary_keeper.index');
               
                   Route::get('/create','Admin\DiaryKeepersController@create')
                        ->name('admin.diary_keeper.create');
               
                   Route::get('/show/{diaryKeeper}','Admin\DiaryKeepersController@show')
                        ->name('admin.diary_keeper.show')
                        ->where('id', '[0-9]+');
               
                   Route::get('/{diaryKeeper}/edit','Admin\DiaryKeepersController@edit')
                        ->name('admin.diary_keeper.edit')
                        ->where('id', '[0-9]+');
               
                   Route::post('/', 'Admin\DiaryKeepersController@store')
                        ->name('admin.diary_keeper.store');
                              
                   Route::put('diary_keeper/{diaryKeeper}', 'Admin\DiaryKeepersController@update')
                        ->name('admin.diary_keeper.update')
                        ->where('id', '[0-9]+');
               
                   Route::delete('/diary_keeper/{diaryKeeper}','Admin\DiaryKeepersController@destroy')
                        ->name('admin.diary_keeper.destroy')
                        ->where('id', '[0-9]+');
               
               });
     

//Livestock_keeper

     Route::group(
               [
                   'prefix' => 'admin/livestock_keeper',
               ], function () {
               
                   Route::get('/', 'Admin\LivestockKeepersController@index')
                        ->name('admin.livestock_keeper.index');
               
                   Route::get('/create','Admin\LivestockKeepersController@create')
                        ->name('admin.livestock_keeper.create');
               
                   Route::get('/show/{livestockKeeper}','Admin\LivestockKeepersController@show')
                        ->name('admin.livestock_keeper.show')
                        ->where('id', '[0-9]+');
               
                   Route::get('/{livestockKeeper}/edit','Admin\LivestockKeepersController@edit')
                        ->name('admin.livestock_keeper.edit')
                        ->where('id', '[0-9]+');
               
                   Route::post('/', 'Admin\LivestockKeepersController@store')
                        ->name('admin.livestock_keeper.store');
                              
                   Route::put('livestock_keeper/{livestockKeeper}', 'Admin\LivestockKeepersController@update')
                        ->name('admin.livestock_keeper.update')
                        ->where('id', '[0-9]+');
               
                   Route::delete('/livestock_keeper/{livestockKeeper}','Admin\LivestockKeepersController@destroy')
                        ->name('admin.livestock_keeper.destroy')
                        ->where('id', '[0-9]+');
               
               });
     
//Livestock_products

     Route::group(
               [
                   'prefix' => 'admin/livestock_product',
               ], function () {
               
                   Route::get('/', 'Admin\LivestockProductsController@index')
                        ->name('admin.livestock_product.index');
               
                   Route::get('/create','Admin\LivestockProductsController@create')
                        ->name('admin.livestock_product.create');
               
                   Route::get('/show/{livestockProduct}','Admin\LivestockProductsController@show')
                        ->name('admin.livestock_product.show')
                        ->where('id', '[0-9]+');
               
                   Route::get('/{livestockProduct}/edit','Admin\LivestockProductsController@edit')
                        ->name('admin.livestock_product.edit')
                        ->where('id', '[0-9]+');
               
                   Route::post('/', 'Admin\GrazingLands@store')
                        ->name('admin.livestock_product.store');
                              
                   Route::put('livestock_product/{livestockProduct}', 'Admin\LivestockProductsController@update')
                        ->name('admin.livestock_product.update')
                        ->where('id', '[0-9]+');
               
                   Route::delete('/livestock_product/{livestockProduct}','Admin\LivestockProductsController@destroy')
                        ->name('admin.livestock_product.destroy')
                        ->where('id', '[0-9]+');
               
               });

//Grazzing_land

     Route::group(
               [
                   'prefix' => 'admin/grazzing_land',
               ], function () {
               
                   Route::get('/', 'Admin\GrazingLandsController@index')
                        ->name('admin.grazzing_land.index');
               
                   Route::get('/create','Admin\GrazingLandsController@create')
                        ->name('admin.grazzing_land.create');
               
                   Route::get('/show/{grazingLand}','Admin\GrazingLandsController@show')
                        ->name('admin.grazzing_land.show')
                        ->where('id', '[0-9]+');
               
                   Route::get('/{grazingLand}/edit','Admin\GrazingLandsController@edit')
                        ->name('admin.grazzing_land.edit')
                        ->where('id', '[0-9]+');
               
                   Route::post('/', 'Admin\GrazingLands@store')
                        ->name('admin.grazzing_land.store');
                              
                   Route::put('grazzing_land/{grazingLand}', 'Admin\GrazingLandsController@update')
                        ->name('admin.grazzing_land.update')
                        ->where('id', '[0-9]+');
               
                   Route::delete('/grazzing_land/{grazingLand}','Admin\GrazingLandsController@destroy')
                        ->name('admin.grazzing_land.destroy')
                        ->where('id', '[0-9]+');
               
               });


//Cattle_keeper

     Route::group(
               [
                   'prefix' => 'admin/cattle_keeper',
               ], function () {
               
                   Route::get('/', 'Admin\CattleKeepersController@index')
                        ->name('admin.cattle_keeper.index');
               
                   Route::get('/create','Admin\CattleKeepersController@create')
                        ->name('admin.cattle_keeper.create');
               
                   Route::get('/show/{cattleKeeper}','Admin\CattleKeepersController@show')
                        ->name('admin.cattle_keeper.show')
                        ->where('id', '[0-9]+');
               
                   Route::get('/{cattleKeeper}/edit','Admin\CattleKeepersController@edit')
                        ->name('admin.cattle_keeper.edit')
                        ->where('id', '[0-9]+');
               
                   Route::post('/', 'Admin\CattleKeepersController@store')
                        ->name('admin.cattle_keeper.store');
                              
                   Route::put('cattle_keeper/{cattleKeeper}', 'Admin\CattleKeepersController@update')
                        ->name('admin.cattle_keeper.update')
                        ->where('id', '[0-9]+');
               
                   Route::delete('/cattle_keeper/{cattleKeeper}','Admin\CattleKeepersController@destroy')
                        ->name('admin.cattle_keeper.destroy')
                        ->where('id', '[0-9]+');
               
               });
     


//Cattle_distribution

     Route::group(
               [
                   'prefix' => 'admin/cattle_distribution',
               ], function () {
               
                   Route::get('/', 'Admin\CattleDistributionsController@index')
                        ->name('admin.cattle_distribution.index');
               
                   Route::get('/create','Admin\CattleDistributionsController@create')
                        ->name('admin.cattle_distribution.create');
               
                   Route::get('/show/{cattleDistribution}','Admin\CattleDistributionsController@show')
                        ->name('admin.cattle_distribution.show')
                        ->where('id', '[0-9]+');
               
                   Route::get('/{cattleDistribution}/edit','Admin\CattleDistributionsController@edit')
                        ->name('admin.cattle_distribution.edit')
                        ->where('id', '[0-9]+');
               
                   Route::post('/', 'Admin\CattleDistributionsController@store')
                        ->name('admin.cattle_distribution.store');
                              
                   Route::put('cattle_distribution/{cattleDistribution}', 'Admin\CattleDistributionsController@update')
                        ->name('admin.cattle_distribution.update')
                        ->where('id', '[0-9]+');
               
                   Route::delete('/cattle_distribution/{cattleDistribution}','Admin\CattleDistributionsController@destroy')
                        ->name('admin.cattle_distribution.destroy')
                        ->where('id', '[0-9]+');
               
               });


//Veterinary_facilityservice

     Route::group(
               [
                   'prefix' => 'admin/veterinary_facilityservice',
               ], function () {
               
                   Route::get('/', 'Admin\VeterinaryFacilityservicesController@index')
                        ->name('admin.veterinary_facilityservice.index');
               
                   Route::get('/create','Admin\VeterinaryFacilityservicesController@create')
                        ->name('admin.veterinary_facilityservice.create');
               
                   Route::get('/show/{veterinaryFacilityservice}','Admin\VeterinaryFacilityservicesController@show')
                        ->name('admin.veterinary_facilityservice.show')
                        ->where('id', '[0-9]+');
               
                   Route::get('/{veterinaryFacilityservice}/edit','Admin\VeterinaryFacilityservicesController@edit')
                        ->name('admin.veterinary_facilityservice.edit')
                        ->where('id', '[0-9]+');
               
                   Route::post('/', 'Admin\VeterinaryFacilityservicesController@store')
                        ->name('admin.veterinary_facilityservice.store');
                              
                   Route::put('veterinary_facilityservice/{veterinaryFacilityservice}', 'Admin\VeterinaryFacilityservicesController@update')
                        ->name('admin.veterinary_facilityservice.update')
                        ->where('id', '[0-9]+');
               
                   Route::delete('/veterinary_facilityservice/{veterinaryFacilityservice}','Admin\VeterinaryFacilityservicesController@destroy')
                        ->name('admin.veterinary_facilityservice.destroy')
                        ->where('id', '[0-9]+');
               
               });

//LIVESTOCK-END 

//FISHES
 //Livestocks Report Controller :: controllerName:LivestockReportsController
  Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/fish',
     ], function () {
 
     Route::get('/', 'Admin\FishReportsController@create')
                ->name('admin.fish.report.create');

     Route::post('/report', 'Admin\FishReportsController@report')
                ->name('admin.fish.report.report');
 });

Route::group(
     [
         'prefix' => 'admin/fishs',
     ], function () {
     
         Route::get('/', 'Admin\FishsController@index')
              ->name('admin.fish.index');
     
         Route::get('/create','Admin\FishsController@create')
              ->name('admin.fish.create');
     
         Route::get('/show/{fish}','Admin\FishsController@show')
              ->name('admin.fish.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{fish}/edit','Admin\FishsController@edit')
              ->name('admin.fish.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\FishsController@store')
              ->name('admin.fish.store');
                    
         Route::put('fish/{fish}', 'Admin\FishsController@update')
              ->name('admin.fish.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/fish/{fish}','Admin\FishsController@destroy')
              ->name('admin.fish.destroy')
              ->where('id', '[0-9]+');
     
     });
     
     Route::group(
     [
         'prefix' => 'admin/land_plan-use-fishs',
     ], function () {
     
         Route::get('/', 'Admin\LandUsePlanFishsController@index')
              ->name('admin.land_use_plan_fish.index');
     
         Route::get('/create','Admin\LandUsePlanFishsController@create')
              ->name('admin.land_use_plan_fish.create');
     
         Route::get('/show/{landUsePlanFish}','Admin\LandUsePlanFishsController@show')
              ->name('admin.land_use_plan_fish.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{landUsePlanFish}/edit','Admin\LandUsePlanFishsController@edit')
              ->name('admin.land_use_plan_fish.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\LandUsePlanFishsController@store')
              ->name('admin.land_use_plan_fish.store');
                    
         Route::put('land_use_plan_fish/{landUsePlanFish}', 'Admin\LandUsePlanFishsController@update')
              ->name('admin.land_use_plan_fish.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/land_use_plan_fish/{landUsePlanFish}','Admin\LandUsePlanFishsController@destroy')
              ->name('admin.land_use_plan_fish.destroy')
              ->where('id', '[0-9]+');
     
     });



// FishDetailController Report Controller
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/fish_detail',
     ], function () {

     Route::get('/', 'Admin\FishDetailReportsController@create')
                    ->name('admin.fish_detail.report.create');

     Route::post('/report', 'Admin\FishDetailReportsController@report')
                    ->name('admin.fish_detail.report.report');
 });

  //Fish_details
     Route::group(
          [
              'prefix' => 'admin/fish_detail',
          ], function () {
          
              Route::get('/', 'Admin\FishDetailsController@index')
                   ->name('admin.fish_detail.index');
          
              Route::get('/create','Admin\FishDetailsController@create')
                   ->name('admin.fish_detail.create');
          
              Route::get('/show/{fishDetail}','Admin\FishDetailsController@show')
                   ->name('admin.fish_detail.show')
                   ->where('id', '[0-9]+');
          
              Route::get('/{fishDetail}/edit','Admin\FishDetailsController@edit')
                   ->name('admin.fish_detail.edit')
                   ->where('id', '[0-9]+');
          
              Route::post('/', 'Admin\FishDetailsController@store')
                   ->name('admin.fish_detail.store');
                         
              Route::put('fish_detail/{fishDetail}', 'Admin\FishDetailsController@update')
                   ->name('admin.fish_detail.update')
                   ->where('id', '[0-9]+');
          
              Route::delete('/fish_detail/{fishDetail}','Admin\FishDetailsController@destroy')
                   ->name('admin.fish_detail.destroy')
                   ->where('id', '[0-9]+');
          
          });

// LivestocMarketController Report Controller 
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/livestock_market',
     ], function () {

     Route::get('/', 'Admin\LivestockMarketReportsController@create')
                    ->name('admin.livestock_market.report.create');

     Route::post('/report', 'Admin\LivestockMarketReportsController@report')
                    ->name('admin.livestock_market.report.report');
 });

//Livestock_market
     Route::group(
          [
              'prefix' => 'admin/livestock_market',
          ], function () {
          
              Route::get('/', 'Admin\LivestockMarketsController@index')
                   ->name('admin.livestock_market.index');
          
              Route::get('/create','Admin\LivestockMarketsController@create')
                   ->name('admin.livestock_market.create');
          
              Route::get('/show/{livestockMarket}','Admin\LivestockMarketsController@show')
                   ->name('admin.livestock_market.show')
                   ->where('id', '[0-9]+');
          
              Route::get('/{livestockMarket}/edit','Admin\LivestockMarketsController@edit')
                   ->name('admin.livestock_market.edit')
                   ->where('id', '[0-9]+');
          
              Route::post('/', 'Admin\LivestockMarketsController@store')
                   ->name('admin.livestock_market.store');
                         
              Route::put('livestock_market/{livestockMarket}', 'Admin\LivestockMarketsController@update')
                   ->name('admin.livestock_market.update')
                   ->where('id', '[0-9]+');
          
              Route::delete('/livestock_market/{livestockMarket}','Admin\LivestockMarketsController@destroy')
                   ->name('admin.livestock_market.destroy')
                   ->where('id', '[0-9]+');
          
          });


// FishMarketController Report Controller 
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/fish_market',
     ], function () {

     Route::get('/', 'Admin\FishMarketReportsController@create')
                    ->name('admin.fish_market.report.create');

     Route::post('/report', 'Admin\FishMarketReportsController@report')
                    ->name('admin.fish_market.report.report');
 });

//Fish_market
     Route::group(
          [
              'prefix' => 'admin/fish_market',
          ], function () {
          
              Route::get('/', 'Admin\FishMarketsController@index')
                   ->name('admin.fish_market.index');
          
              Route::get('/create','Admin\FishMarketsController@create')
                   ->name('admin.fish_market.create');
          
              Route::get('/show/{fishMarket}','Admin\FishMarketsController@show')
                   ->name('admin.fish_market.show')
                   ->where('id', '[0-9]+');
          
              Route::get('/{fishMarket}/edit','Admin\FishMarketsController@edit')
                   ->name('admin.fish_market.edit')
                   ->where('id', '[0-9]+');
          
              Route::post('/', 'Admin\FishMarketsController@store')
                   ->name('admin.fish_market.store');
                         
              Route::put('fish_market/{fishMarket}', 'Admin\FishMarketsController@update')
                   ->name('admin.fish_market.update')
                   ->where('id', '[0-9]+');
          
              Route::delete('/fish_market/{fishMarket}','Admin\FishMarketsController@destroy')
                   ->name('admin.fish_market.destroy')
                   ->where('id', '[0-9]+');
          
          });

           //Fish ends


     // LivestockDiseaseController Report Controller 
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/livestock_disease',
     ], function () {

     Route::get('/', 'Admin\LivestockDiseaseReportsController@create')
                    ->name('admin.livestock_disease.report.create');

     Route::post('/report', 'Admin\LivestockDiseaseReportsController@report')
                    ->name('admin.livestock_disease.report.report');
 });

//Livestock_disease
     Route::group(
          [
              'prefix' => 'admin/livestock_disease',
          ], function () {
          
              Route::get('/', 'Admin\LivestockDiseasesController@index')
                   ->name('admin.livestock_disease.index');
          
              Route::get('/create','Admin\LivestockDiseasesController@create')
                   ->name('admin.livestock_disease.create');
          
              Route::get('/show/{livestockDisease}','Admin\LivestockDiseasesController@show')
                   ->name('admin.livestock_disease.show')
                   ->where('id', '[0-9]+');
          
              Route::get('/{livestockDisease}/edit','Admin\LivestockDiseasesController@edit')
                   ->name('admin.livestock_disease.edit')
                   ->where('id', '[0-9]+');
          
              Route::post('/', 'Admin\LivestockDiseasesController@store')
                   ->name('admin.livestock_disease.store');
                         
              Route::put('livestock_disease/{livestockDisease}', 'Admin\LivestockDiseasesController@update')
                   ->name('admin.livestock_disease.update')
                   ->where('id', '[0-9]+');
          
              Route::delete('/livestock_disease/{livestockDisease}','Admin\LivestockDiseasesController@destroy')
                   ->name('admin.livestock_disease.destroy')
                   ->where('id', '[0-9]+');
          
          });

//LIVESTOCK AND FISHERIES ENDS

// NATURAL RESOURCES

     //Natural Resources Routes
 //Natural Resources directed Reports Controller::WaterResourcesReportsController
 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/natural_resources',
     ], function () {
 
     Route::get('/', 'Admin\NaturalResourcesReportsController@index')
                ->name('admin.general_natural_resorce_report.index');

 });
//NATURAL RESOURCES ENDS

 // PHYSICAL AND SOCIAL INFASTRUCTURES
     //physical and social infastructures Routes
 //physical and social directed Reports Controller::WaterResourcesReportsController
 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/physical_socials',
     ], function () {
 
     Route::get('/', 'Admin\PhysicalSocialsReportsController@index')
                ->name('admin.physical_social_infastructure_report.index');

 });
//PHYSICAL AND SOCIAL INFASTRUCTURES ENDS

// STAKEHOLDERS

     //Stakeholders Routes
 //Stakeholders directed Reports Controller::WaterResourcesReportsController
 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/stakeholders',
     ], function () {
 
     Route::get('/', 'Admin\StakeholdersReportsController@index')
                ->name('admin.general_stakeholders_report.index');

 });

//STAKEHOLDERS ENDS

     // WATER RESOURCES

     //Water Resources Routes
 //Water Resources directed Reports Controller::WaterResourcesReportsController
 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/water_resources',
     ], function () {
 
     Route::get('/', 'Admin\WaterResourcesReportsController@index')
                ->name('admin.general_water_resorce_report.index');

 });

//WATER RESOURCES ENDS

 //Natura Resources
 //Natural resources Reports Controller::WildlifesReportsController
 Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/natural_resources',
     ], function () {
 
     Route::get('/', 'Admin\NaturalResourcesReportsController@index')
                ->name('admin.general_natural_resorce_report.index');

 });

  //Wildlifes Report Controller :: controllerName:WildlifeReportsController
  Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/wildlife',
     ], function () {
 
     Route::get('/', 'Admin\WildlifeReportsController@create')
                ->name('admin.wildlife.report.create');

     Route::post('/report', 'Admin\WildlifeReportsController@report')
                ->name('admin.wildlife.report.report');
 });


 //NATURAL RESOURCE WLDLIFE-MAIN ROUTE
Route::group(
     [
         'prefix' => 'admin/wildlifes',
     ], function () {
     
         Route::get('/', 'Admin\WildlifesController@index')
              ->name('admin.wildlife.index');
     
         Route::get('/create','Admin\WildlifesController@create')
              ->name('admin.wildlife.create');
     
         Route::get('/show/{wildlife}','Admin\WildlifesController@show')
              ->name('admin.wildlife.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{wildlife}/edit','Admin\WildlifesController@edit')
              ->name('admin.wildlife.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\WildlifesController@store')
              ->name('admin.wildlife.store');
                    
         Route::put('wildlife/{wildlife}', 'Admin\WildlifesController@update')
              ->name('admin.wildlife.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/wildlife/{wildlife}','Admin\WildlifesController@destroy')
              ->name('admin.wildlife.destroy')
              ->where('id', '[0-9]+');
     
     });
     
     //NATURAL RESOURCES ROTES-land_plan-use-wildlifes'

     Route::group(
     [
         'prefix' => 'admin/land_plan-use-wildlifes',
     ], function () {
     
         Route::get('/', 'Admin\LandUsePlanWildlifesController@index')
              ->name('admin.land_use_plan_wildlife.index');
     
         Route::get('/create','Admin\LandUsePlanWildlifesController@create')
              ->name('admin.land_use_plan_wildlife.create');
     
         Route::get('/show/{landUsePlanWildlife}','Admin\LandUsePlanWildlifesController@show')
              ->name('admin.land_use_plan_wildlife.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{landUsePlanWildlifek}/edit','Admin\LandUsePlanWildlifesController@edit')
              ->name('admin.land_use_plan_wildlife.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\LandUsePlanWildlifesController@store')
              ->name('admin.land_use_plan_wildlife.store');
                    
         Route::put('land_use_plan_wildlife/{landUsePlanWildlife}', 'Admin\LandUsePlanWildlifesController@update')
              ->name('admin.land_use_plan_wildlife.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/land_use_plan_wildlife/{landUsePlanWildlife}','Admin\LandUsePlanWildlifesController@destroy')
              ->name('admin.land_use_plan_wildlife.destroy')
              ->where('id', '[0-9]+');
     
     });

      // WildlifeCorridorController Report Controller ::wildlife_corridor
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/wildlife_corridor',
     ], function () {

     Route::get('/', 'Admin\WildlifeCorridorReportsController@create')
                    ->name('admin.wildlife_corridor.report.create');

     Route::post('/report', 'Admin\WildlifeCorridorReportsController@report')
                    ->name('admin.wildlife_corridor.report.report');
 });

//ROUTES FOR- wildlife_corridor
     Route::group(
          [
              'prefix' => 'admin/wildlife_corridor',
          ], function () {
          
              Route::get('/', 'Admin\WildlifeCorridorsController@index')
                   ->name('admin.wildlife_corridor.index');
          
              Route::get('/create','Admin\WildlifeCorridorsController@create')
                   ->name('admin.wildlife_corridor.create');
          
              Route::get('/show/{wildlifeCorridor}','Admin\WildlifeCorridorsController@show')
                   ->name('admin.wildlife_corridor.show')
                   ->where('id', '[0-9]+');
          
              Route::get('/{wildlifeCorridor}/edit','Admin\WildlifeCorridorsController@edit')
                   ->name('admin.wildlife_corridor.edit')
                   ->where('id', '[0-9]+');
          
              Route::post('/', 'Admin\WildlifeCorridorsController@store')
                   ->name('admin.wildlife_corridor.store');
                         
              Route::put('wildlife_corridor/{wildlifeCorridor}', 'Admin\WildlifeCorridorsController@update')
                   ->name('admin.wildlife_corridor.update')
                   ->where('id', '[0-9]+');
          
              Route::delete('/wildlife_corridor/{wildlifeCorridor}','Admin\WildlifeCorridorsController@destroy')
                   ->name('admin.wildlife_corridor.destroy')
                   ->where('id', '[0-9]+');
          
          });


// WildlifeConservationController Report Controller 
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/wildlife_conservation',
     ], function () {

     Route::get('/', 'Admin\WildlifeConservationReportsController@create')
                    ->name('admin.wildlife_conservation.report.create');

     Route::post('/report', 'Admin\WildlifeConservationReportsController@report')
                    ->name('admin.wildlife_conservation.report.report');
 });


//wildlife_conservations
Route::group(
     [
         'prefix' => 'admin/wildlife_conservation',
     ], function () {
     
         Route::get('/', 'Admin\WildlifeConservationsController@index')
              ->name('admin.wildlife_conservation.index');
     
         Route::get('/create','Admin\WildlifeConservationsController@create')
              ->name('admin.wildlife_conservation.create');
     
         Route::get('/show/{wildlifeConservation}','Admin\WildlifeConservationsController@show')
              ->name('admin.wildlife_conservation.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{wildlifeConservation}/edit','Admin\WildlifeConservationsController@edit')
              ->name('admin.wildlife_conservation.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\WildlifeConservationsController@store')
              ->name('admin.wildlife_conservation.store');
                    
         Route::put('wildlife_conservation/{wildlifeConservation}', 'Admin\WildlifeConservationsController@update')
              ->name('admin.wildlife_conservation.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/wildlife_conservation/{wildlifeConservation}','Admin\WildlifeConservationsController@destroy')
              ->name('admin.wildlife_conservation.destroy')
              ->where('id', '[0-9]+');
     
     });

     //NATURAL RESOURCES ENDS


     //MININGING

     //Minerals Report Controller :: controllerName:MineralReportsController
  Route::group(
     [   'middleware' => ['auth'],
         'prefix' => 'admin/reports/mineral',
     ], function () {
 
     Route::get('/', 'Admin\MineralReportsController@create')
                ->name('admin.mineral.report.create');

     Route::post('/report', 'Admin\MineralReportsController@report')
                ->name('admin.mineral.report.report');
 });


 //NATURAL RESOURCE MINERALS-MAIN ROUTE
Route::group(
     [
         'prefix' => 'admin/minerals',
     ], function () {
     
         Route::get('/', 'Admin\MineralsController@index')
              ->name('admin.mineral.index');
     
         Route::get('/create','Admin\MineralsController@create')
              ->name('admin.mineral.create');
     
         Route::get('/show/{mineral}','Admin\MineralsController@show')
              ->name('admin.mineral.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{mineral}/edit','Admin\MineralsController@edit')
              ->name('admin.mineral.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\MineralsController@store')
              ->name('admin.mineral.store');
                    
         Route::put('mineral/{mineral}', 'Admin\MineralsController@update')
              ->name('admin.mineral.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/mineral/{mineral}','Admin\MineralsController@destroy')
              ->name('admin.mineral.destroy')
              ->where('id', '[0-9]+');
     
     });
     
     //NATURAL RESOURCES ROTES-land_plan-use-minerals'

     Route::group(
     [
         'prefix' => 'admin/land_plan-use-minerals',
     ], function () {
     
         Route::get('/', 'Admin\LandUsePlanMineralsController@index')
              ->name('admin.land_use_plan_mineral.index');
     
         Route::get('/create','Admin\LandUsePlanMineralsController@create')
              ->name('admin.land_use_plan_mineral.create');
     
         Route::get('/show/{landUsePlanMineral}','Admin\LandUsePlanMineralsController@show')
              ->name('admin.land_use_plan_mineral.show')
              ->where('id', '[0-9]+');
     
         Route::get('/{landUsePlanMineralk}/edit','Admin\LandUsePlanMineralsController@edit')
              ->name('admin.land_use_plan_mineral.edit')
              ->where('id', '[0-9]+');
     
         Route::post('/', 'Admin\LandUsePlanMineralsController@store')
              ->name('admin.land_use_plan_mineral.store');
                    
         Route::put('land_use_plan_mineral/{landUsePlanMineral}', 'Admin\LandUsePlanMineralsController@update')
              ->name('admin.land_use_plan_mineral.update')
              ->where('id', '[0-9]+');
     
         Route::delete('/land_use_plan_mineral/{landUsePlanMineral}','Admin\LandUsePlanMineralsController@destroy')
              ->name('admin.land_use_plan_mineral.destroy')
              ->where('id', '[0-9]+');
     
     });

    //Mining details
    // MiningDetailController Report Controller
  Route::group(
     [   'middleware' => ['auth'],
          'prefix' => 'admin/reports/mineral_detail',
     ], function () {

     Route::get('/', 'Admin\MineralDetailReportsController@create')
                    ->name('admin.mineral_detail.report.create');

     Route::post('/report', 'Admin\MineralDetailReportsController@report')
                    ->name('admin.mineral_detail.report.report');
 });
 
  //Mining_details
     Route::group(
          [
              'prefix' => 'admin/mineral_detail',
          ], function () {
          
              Route::get('/', 'Admin\MineralDetailsController@index')
                   ->name('admin.mineral_detail.index');
          
              Route::get('/create','Admin\MineralDetailsController@create')
                   ->name('admin.mineral_detail.create');
          
              Route::get('/show/{mineralDetail}','Admin\MineralDetailsController@show')
                   ->name('admin.mineral_detail.show')
                   ->where('id', '[0-9]+');
          
              Route::get('/{mineralDetail}/edit','Admin\MineralDetailsController@edit')
                   ->name('admin.mineral_detail.edit')
                   ->where('id', '[0-9]+');
          
              Route::post('/', 'Admin\MineralDetailsController@store')
                   ->name('admin.mineral_detail.store');
                         
              Route::put('mineral_detail/{mineralDetail}', 'Admin\MineralDetailsController@update')
                   ->name('admin.mineral_detail.update')
                   ->where('id', '[0-9]+');
          
              Route::delete('/mineral_detail/{mineralDetail}','Admin\MineralDetailsController@destroy')
                   ->name('admin.mineral_detail.destroy')
                   ->where('id', '[0-9]+');
          
          });