@include ('reports.agriculture.cultivated_land_yields.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                 
                    <th>Name Of Crop</th>
                    <td>Actual Activated Land(Ha)</td>
                    <td>Possible Yield(Ha)</td>
                    <td>District Average Yield (Ton/Hectare)</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan)
                <tr>
                  <td>{{ optional($plan->Crop)->name }} </td>
                  <td>{{  $plan->actual_cultivated_land }} </td>
                  <td>{{  $plan->possible_yield }} </td>
                  <td>{{  $plan->possible_yield/$plan->actual_cultivated_land }}</td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>