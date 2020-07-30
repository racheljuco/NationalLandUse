@include ('reports.natural_resources.minerals.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <td>Mineral</td>
                    <td>Mineral Type</td>

                  </tr>

              </thead>
              <tbody>
                @foreach($minerals as $index => $mineral)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $mineral->name }}</td>
                  <td>{{ optional($mineral->MineralType)->name }}</td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
