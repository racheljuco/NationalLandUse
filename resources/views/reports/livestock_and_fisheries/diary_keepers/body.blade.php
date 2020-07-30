@include ('reports.livestock_and_fisheries.diary_keepers.header')

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
                    <td>Numnber of Livestock</td>
                    <td>Diary Keeper Name</td>

                  </tr>

              </thead>
              <tbody>
              @foreach($land_use_plans  as $plan => $livestock)
                <tr>
                  <td>{{ ++$plan }} </td>
                  <td>{{ optional($livestock->Village)->village_name }} </td>
                  <td>{{ optional($livestock->Livestock)->name }} </td>
                  <td>{{  $livestock->number_of_livestock }} </td>
                  <td>{{  $livestock->diary_farm_name }} </td>
       
                </tr>
                @endforeach

              </tbody>

              </table>
</div>