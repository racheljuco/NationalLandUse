@include ('reports.livestock_and_fisheries.livestock_keepers.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>Village Name</th>
                    <th>Name Of Livestock</th>
                    <!--<td>Livestock Type</td>-->
                    <td>Number of Cattle</td>
                    <td>Cattle Keeper Name</td>
                    <td>Cattle Division Name</td>
                  
                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan)
                <tr>
                  <td>{{ optional($plan->Village)->village_name }} </td>
                  <td>{{ optional($plan->Livestock)->name }} </td>
                 <!-- <td>{{ optional($plan->LivestockType)->name }}</td>-->
                  <td>{{  $plan->number_of_cattle }} </td>
                  <td>{{  $plan->cattle_keeper_name }} </td>
                  <td>{{  $plan->division_name }} </td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>