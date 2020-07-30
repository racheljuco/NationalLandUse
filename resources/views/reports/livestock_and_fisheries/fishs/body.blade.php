@include ('reports.livestock_and_fisheries.fishs.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <td>Fish</td>
                    <td>Fish Type</td>

                  </tr>

              </thead>
              <tbody>
                @foreach($fishs as $index => $fish)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $fish->name }}</td>
                  <td>{{ optional($fish->fishType)->name }}</td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
