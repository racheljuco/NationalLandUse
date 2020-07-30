@include ('reports.livestock_and_fisheries.veterinary_facilityservices.header')

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
                    <td>Number of Vetinary Facility </td>
                    <td>Number of Extension Officers</td>
                    <td>Number of Manywesheo</td>
                    <td>Number of Livestocks</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{  $livestock->name_division }} </td>
                  <td>{{  $livestock->name_ward }} </td>
                  <td>{{  $livestock->number_facility_service}}</td>
                  <td>{{  $livestock->number_extension_officer}}</td>
                  <td>{{  $livestock->number_manywesheo}}</td>
                  <td>{{  $livestock->number_livestock}}</td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>