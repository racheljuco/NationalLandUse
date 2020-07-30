@include ('reports.livestock_and_fisheries.grazzing_lands.header')

<div class="letter">

<!-- <h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br> -->

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                 
                    <th>S/no</th>
                    <th>Village Name</th>
                    <td>Division</td>
                    <td>Ward</td>
                    <td>Area(Ha)</td>
                    <td>District Area(%)</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{  $livestock->name_division }} </td>
                  <td>{{  $livestock->name_ward }} </td>
                  <td>{{  $livestock->area}}</td>
                  <td>{{  $livestock->district_area}}</td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>