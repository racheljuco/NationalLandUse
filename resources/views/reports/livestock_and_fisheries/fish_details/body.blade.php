@include ('reports.livestock_and_fisheries.fish_details.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr> 
                  
                    <th>S/no</th>
                    <th>Village Name</th>
                    <th>Name Of Fish</th>
                    <td>Fishing Areas</td>
                    <td>Number of Fishers</td>
                    <td>Amount Produced</td>
                    <td>Year</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{ optional($livestock->Fish)->name }} </td>
                  <td>{{  $livestock->fishing_place }} </td>
                  <td>{{  $livestock->fisher_number }} </td>
                  <td>{{  $livestock->fish_amount }} </td>
                  <td>{{  $livestock->year }} </td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>