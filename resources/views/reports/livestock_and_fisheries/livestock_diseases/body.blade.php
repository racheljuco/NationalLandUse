@include ('reports.livestock_and_fisheries.livestock_diseases.header')

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
                    <th>Type Of Livestock</th>
                    <td>Diseases</td>
                    

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{  $livestock->name_division }} </td>
                  <td>{{  $livestock->name_ward }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{ optional($livestock->Livestock)->name }} </td>
                  <td>{{  $livestock->livestock_disease_name }} </td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
</div>