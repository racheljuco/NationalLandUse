@include ('reports.natural_resources.wildlife_corridors.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr> 
                  
                    <th>S/no</th>
                    <td>Division</td>
                    <td>Ward</td>
                    <th>Village Name</th>
                    <th>Type Of Wildlife</th>
                    <td>Wildlife Corridor by Name</td>
                    

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans as $plan => $wildlife)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{  $wildlife->name_division }} </td>
                  <td>{{  $wildlife->name_ward }} </td>
                  <td>{{ optional($wildlife->Village)->village_name }} </td>
                  <td>{{ optional($wildlife->Wildlife)->name }} </td>
                  <td>{{  $wildlife->wildlife_corridor_name }} </td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
</div>