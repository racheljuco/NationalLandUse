@include ('reports.natural_resources.mineral_details.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr> 
                  
                    <th>S/no</th>
                    <th>Village Name</th>
                    <th>Name Of Mineral</th>
                    <th>Mining type</th>
                    <td>Mineral exploitation modality</td>
                    <td>Mining area (H)</td>
                    <td>Mining markets</td>
                    <td>Year</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan => $mineral)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($mineral->Village)->village_name }} </td>
                  <td>{{ optional($mineral->Mineral)->name }} </td>
                  <td>{{  $mineral->mining_type }} </td>
                  <td>{{  $mineral->mineral_exploitation_modality }} </td>
                  <td>{{  $mineral->total_are_for_mining }} </td>
                  <td>{{  $mineral->market_name }} </td>
                  <td>{{  $mineral->year }} </td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>