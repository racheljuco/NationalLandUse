@include ('reports.agriculture.crops.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <td>Crop</td>
                    <td>Crop Type</td>

                  </tr>

              </thead>
              <tbody>
                @foreach($crops as $index => $crop)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $crop->name }}</td>
                  <td>{{ optional($crop->CropType)->name }}</td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
