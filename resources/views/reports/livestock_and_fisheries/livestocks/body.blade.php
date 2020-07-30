@include ('reports.livestock_and_fisheries.livestocks.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <td>Livestock</td>
                    <td>Livestock Type</td>

                  </tr>

              </thead>
              <tbody>
                @foreach($livestocks as $index => $livestock)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $livestock->name }}</td>
                  <td>{{ optional($livestock->LivestockType)->name }}</td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
