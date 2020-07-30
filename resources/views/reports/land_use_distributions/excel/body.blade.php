

<h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br>

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>District</th>
                    <th>Village</th>
                    <td>Village Area(Ha)</td>
                    <td>Projected Household(10yrs)</td>
                    <td>Year Of Preparation</td>
                    <td>Settlement(Ha)</td>
                    <td>Social Service(Ha)</td>
                    <td>Agriculture(Ha)</td>
                    <td>Agriculture and Settlements(Ha)</td>
                    <td>Grazing(Ha)</td>
                    <td>Utilization Forest (Ha)</td>
                    <td>Reserved Forest (Ha)</td>
                     <td>Other Reserved Land (Ha)</td>
                     <td>Water Sources (Ha)</td>
                     <td>WMA (Ha)</td>
                     <td>Land Bank (Ha)</td>
                     <td>Land Investment (Ha)</td>
                     <td>Quarrying (Ha)</td>

                  </tr>

              </thead>
              <tbody>
                @foreach($land_use_plans as $index => $plan)
                <tr>
                   <td>{{  optional($plan->village->District)->district_name }} </td>
                  <td>{{  optional($plan->village)->village_name }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->village_area }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->projected_households }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->year_preparation }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->settlement }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->social_service }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->agriculture }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->agriculture_settlement }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->grazing }} </td>
                  <td>{{  optional($plan->LandUseDistribution)->utilization_forest }}</td>
                  <td>{{  optional($plan->LandUseDistribution)->reserved_forest }}</td>
                  <td>{{  optional($plan->LandUseDistribution)->other_reserved_land }}</td>
                  <td>{{  optional($plan->LandUseDistribution)->water_sources }}</td>
                  <td>{{  optional($plan->LandUseDistribution)->wma }}</td>
                  <td>{{  optional($plan->LandUseDistribution)->land_bank }}</td>
                  <td>{{  optional($plan->LandUseDistribution)->land_investment }}</td>
                  <td>{{  optional($plan->LandUseDistribution)->quarrying }}</td>
                </tr>
                @endforeach

              </tbody>

              </table>
