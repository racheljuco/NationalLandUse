@include ('reports.livestock_and_fisheries.livestock_products.header')

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
                    <td>Slaughted</td>
                    <td>Eggs</td>
                    <td>Milk</td>

                  </tr>

              </thead> 
              <tbody>
              @foreach($land_use_plans  as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{ optional($livestock->Livestock)->name }} </td>
                  <td>{{  $livestock->slaughted}} </td>
                  <td>{{  $livestock->eggs }} </td>
                  <td>{{  $livestock->milk }}</td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>