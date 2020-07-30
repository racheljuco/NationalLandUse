@include ('reports.natural_resources.wildlife_conservations.header')

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
                    <th>Type Of Conservation</th>
                    <th>Type Of Wildlife</th>
                    <td>Wildlife Conservation by Name</td>
                    <td>Species availlable by Name</td>
                    <td>Total number of Species available</td>

                  </tr>
                  
              </thead>
              <tbody>
              @foreach($land_use_plans as $plan => $wildlife)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{  $wildlife->name_division }} </td>
                  <td>{{  $wildlife->name_ward }} </td>
                  <td>{{ optional($wildlife->Village)->village_name }} </td>
                  <td>{{  $wildlife->wildlife_conservation_type }} </td>
                  <td>{{ optional($wildlife->Wildlife)->name }} </td>
                  <td>{{  $wildlife->wildlife_conservation_name }} </td>
                  <td>{{  $wildlife->specie_available_name }} </td>
                  <td>{{  $wildlife->total_number_species_available }} </td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
</div>