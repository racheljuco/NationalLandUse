@include ('reports.agriculture.area_under_irrigations.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>Name Of Irrigation Schema</th>
                    <td>Area Of Irrigation(Ha)</td>
                    <td>Area Under Irrigation(Ha)</td>
                    <td>Performance</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan)
                <tr>
                  <td>{{ optional($plan->Village)->village_name }} </td>
                  <td>{{  $plan->area_irrigation }} </td>
                  <td>{{  $plan->area_under_irrigation }} </td>
                  <td>{{  $plan->perfomance }} </td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>