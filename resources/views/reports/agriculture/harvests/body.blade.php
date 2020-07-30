@include ('reports.land_use_distributions.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <!-- <th>S/no</th> -->
                    <th>Village</th>
                    <td>Village Area(Ha)</td>
                    <td>Projected Household(10yrs)</td>
                    <td>Year Of Preparation</td>
                    <td>Settlement(Ha)</td>
                    <td>Social Service(Ha)</td>
                    <td>Agriculture(Ha)</td>
                    <td>Agriculture and Settlements(Ha)</td>
                    <td>Grazing(Ha)</td>
                   
<!-- 
          
            $table->double('utilization_forest',8,2)->default(0);
            $table->double('reserved_forest',8,2)->default(0);
            $table->double('other_reserved_land',8,2)->default(0);
            $table->double('water_sources',8,2)->default(0);
            $table->double('wma',8,2)->default(0);
            $table->double('land_bank',8,2)->default(0);
            $table->double('land_investment',8,2)->default(0);
            $table->double('quarrying',8,2)->default(0);
                     -->
                    

                  </tr>

              </thead>
              <tbody>
                @foreach($land_use_plans as $index => $plan)
                <tr>
                  <!-- <td>{{ ++$index }} </td> -->
                  <td>{{ optional($plan->village)->village_name }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->village_area }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->projected_households }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->year_preparation }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->settlement }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->social_service }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->agriculture }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->agriculture_settlement }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->grazing }} </td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
