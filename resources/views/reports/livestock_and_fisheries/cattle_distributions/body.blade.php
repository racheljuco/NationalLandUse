@include ('reports.livestock_and_fisheries.cattle_distributions.header')

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
                    <td>Total Number of Indigenous- Cattle)</td>
                    <td>Total Number of Dairy-Cattle</td>
                    <td>Total Number of Cattle</td>
                    <td>Total Number of Livestock Units (LU)s</td>
                    <td>Number of Cattle-Keepers</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{  $livestock->name_division }} </td>
                  <td>{{  $livestock->name_ward }} </td>
                  <td>{{  $livestock->total_indigineous_cattle}}</td>
                  <td>{{  $livestock->total_dairy_cattle}}</td>
                  <td>{{  $livestock->total_number_cattle}}</td>
                  <td>{{  $livestock->total_number_livestock_unit}}</td>
                  <td>{{  $livestock->cattle_keepers_number}}</td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>