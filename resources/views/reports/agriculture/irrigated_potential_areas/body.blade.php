@include ('reports.agriculture.irrigated_potential_areas.header')

<div class="letter">

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>Name Of Village</th>
                    <td>Ward</td>
                    <td>Division</td>
                    <td>Area(Ha)</td>
                    <td>% of the District Area</td>
                    
              </thead>
              <tbody>

                @foreach($land_use_plans  as $plan)
                <tr>
                  <td>{{ optional($plan->Village)->village_name }} </td>
                  <td>{{  $plan->name_ward }} </td>
                  <td>{{  $plan->name_division }} </td>
                  <td>{{  $plan->area }} </td>
                  <td>{{  $plan->district_area }} </td>      
                </tr>
                @endforeach

              </tbody>

              </table>
</div>