@include ('reports.livestock_and_fisheries.livestock_projections.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr> 
                  
                    <th>S/no</th>
                    <th>Village Name</th>
                    <th>Name Of Livestock</th>
                    <td>Numnber of Livestock Projected</td>
                    <td>Land Use Projected(Ha)</td>
                    <td>grazing_land(Ha)</td>
                    <td>District Average Yield (Ton/Hectare)</td>

                  </tr>
                
              </thead>
              <tbody>
              @foreach($land_use_plans as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{ optional($livestock->Livestock)->name }} </td>
                  <td>{{  $livestock->number_of_livestock_projected }} </td>
                  <td>{{  $livestock->landuse_projected }} </td>
                  <td>{{  $livestock->grazing_land }} </td>
                  <td>{{  $livestock->landuse_projected/$livestock->number_of_livestock_projected }}</td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>